<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluationResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EvaluationController extends Controller
{
    // 1. Cover Page (Reset Session di sini kalau user baru mulai)
    public function cover()
    {
        // Opsional: Reset session kalau masuk sini
        // session()->forget(['evaluation_answers', 'evaluation_vent']);
        return view('user.self-evaluation-cover');
    }

    // 2. Start Test (Logic Reset)
    public function start()
    {
        // Hapus session lama biar bersih
        session()->forget(['evaluation_answers', 'evaluation_vent']);
        return redirect()->route('evaluation.question', ['page' => 1]);
    }

    // 3. Menampilkan Pertanyaan (Page 1, 2, 3)
    public function question($page)
    {
        // Validasi page cuma boleh 1-3
        if ($page < 1 || $page > 3) {
            return redirect()->route('evaluation.cover');
        }

        // Ambil jawaban yang udah tersimpan di session (biar gak ilang pas back)
        $existingAnswers = session('evaluation_answers', []);

        return view('user.self-evaluation-question', [
            'page' => $page,
            'existingAnswers' => $existingAnswers
        ]);
    }

    // 4. Simpan Jawaban per Page
    public function storeQuestion(Request $request, $page)
    {
        // Ambil data session lama
        $answers = session('evaluation_answers', []);

        // Merge jawaban baru dari form ke array session
        // Validasi simpel: loop input name="answer_x"
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'answer_')) {
                // Ambil nomor soal dari key (misal answer_5 -> 5)
                $questionNumber = (int) str_replace('answer_', '', $key);
                $answers[$questionNumber] = (int) $value;
            }
        }

        // Simpan balik ke session
        session(['evaluation_answers' => $answers]);

        // Logic Redirect
        if ($page < 3) {
            return redirect()->route('evaluation.question', ['page' => $page + 1]);
        } else {
            return redirect()->route('evaluation.vent'); // Ke halaman curhat
        }
    }

    // 5. Halaman Curhat (Vent)
    public function vent()
    {
        // Ambil tulisan yang mungkin udah diketik sebelumnya
        $existingVent = session('evaluation_vent', '');
        return view('user.self-evaluation-vent', compact('existingVent'));
    }

    // 6. Submit Akhir & Mocking API
    public function submit(Request $request)
    {
        // 1. Simpan curhatan ke session
        session(['evaluation_vent' => $request->vent]);

        // 2. Ambil Semua Data & Formatting
        $answersAssoc = session('evaluation_answers', []);
        ksort($answersAssoc); // Pastikan urutan nomor soal 1 sampai 21 berurutan
        $answers = array_values($answersAssoc); // Ratakan jadi array murni [0, 1, 2, ...]

        $vent = session('evaluation_vent', '');

        // 3. Tembak API Python dengan Try-Catch (Anti-Crash System)
        try {
            // Timeout 15 detik biar kalau Gemini/Model agak lemot, web gak langsung RTO
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::timeout(15)->post('http://127.0.0.1:8001/api/v1/evaluate', [
                'answers' => $answers,
                'vent_text' => $vent
            ]);

            // Kalau respon HTTP 200 OK
            if ($response->successful()) {
                $data = $response->json();

                // 4. Simpan ke Database MySQL
                $result = EvaluationResult::create([
                    'user_id' => Auth::id(),
                    'depression_score' => $data['scores']['depression'],
                    'depression_level' => $data['levels']['depression'],
                    'anxiety_score' => $data['scores']['anxiety'],
                    'anxiety_level' => $data['levels']['anxiety'],
                    'stress_score' => $data['scores']['stress'],
                    'stress_level' => $data['levels']['stress'],
                    'ml_label' => $data['ml_analysis']['label'],
                    'gemini_recommendation' => $data['gemini']['recommendation'],
                    'average_score' => $data['average_score'],
                    'final_level' => $data['final_level'],
                ]);

                // Bersihkan session karena udah selesai evaluasi
                session()->forget(['evaluation_answers', 'evaluation_vent']);

                // Redirect ke Hasil
                return redirect()->route('evaluation.result', ['id' => $result->id]);
            } else {
                // API merespon tapi ada error (misal 400 Bad Request atau 500 Internal Server Error)
                Log::error('API Python Error Response: ' . $response->body());
                return back()->with('error', 'Gagal memproses evaluasi. Pastikan kamu mengisi 21 soal dengan lengkap.');
            }

        } catch (\Exception $e) {
            // Server Python Mati atau Koneksi Putus
            Log::error('API Python Connection Failed: ' . $e->getMessage());
            return back()->with('error', 'Server Evaluasi AI sedang sibuk atau offline. Silakan coba beberapa saat lagi.');
        }
    }

    // 7. Halaman Hasil
    public function showResult($id)
    {
        $result = EvaluationResult::where('user_id', Auth::id())->findOrFail($id);

        // --- DUAL-MODALITY CATEGORY ENGINE ---
        // 1. Mapping Keparahan DASS-21
        $severityMap = ['Normal' => 0, 'Ringan' => 1, 'Sedang' => 2, 'Berat' => 3, 'Sangat berat' => 4];
        
        $dassIndices = [
            'Depresi' => $severityMap[$result->depression_level] ?? 0,
            'Kecemasan' => $severityMap[$result->anxiety_level] ?? 0,
            'Stres' => $severityMap[$result->stress_level] ?? 0,
        ];

        $maxIndex = max($dassIndices);
        $targetCategories = [];

        // Ambil kategori objektif yang paling parah
        if ($maxIndex > 0) {
            foreach ($dassIndices as $category => $index) {
                if ($index == $maxIndex) {
                    $targetCategories[] = $category;
                }
            }
        }

        // 2. Tambahkan kategori subjektif dari Machine Learning
        if (!empty($result->ml_label) && $result->ml_label !== 'Normal') {
            $targetCategories[] = $result->ml_label;
        }

        // 3. Bersihkan Duplikat (Misal DASS = Depresi, LSTM = Depresi)
        $targetCategories = array_unique($targetCategories);

        // 4. Fallback Protocol (Kalau user ternyata super sehat)
        if (empty($targetCategories)) {
            $targetCategories = ['Rawat Diri'];
        }

        // 5. Query Eksekusi: Ambil 4 artikel acak yang relevan dengan kondisi user
        $relatedEducations = \App\Models\Education::whereIn('category', $targetCategories)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('user.self-evaluation-results', compact('result', 'relatedEducations'));
    }

    // 8. Halaman Activity History Detail
    public function historyDetail($id)
    {
        $result = EvaluationResult::where('user_id', Auth::id())->findOrFail($id);
        
        // Kita hitung ini tes ke-berapa milik user tersebut
        $testNumber = EvaluationResult::where('user_id', Auth::id())
            ->where('created_at', '<=', $result->created_at)
            ->count();

        return view('user.activity-history', compact('result', 'testNumber'));
    }
}
