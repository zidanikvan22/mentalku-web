<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluationResult;
use Illuminate\Support\Facades\Auth;

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
        // 1. Simpan curhatan ke session dulu
        session(['evaluation_vent' => $request->vent]);

        // 2. Ambil Semua Data
        $answers = session('evaluation_answers');
        $vent = session('evaluation_vent');

        // ---------------------------------------------------------
        // MOCKING API PYTHON (LOGIC DUMMY SEMENTARA)
        // Nanti bagian ini diganti dengan Http::post ke FastAPI
        // ---------------------------------------------------------

        // Dummy Score Calculation (Example Only)
        // Anggap aja ini logic DASS-21 sederhana (Sum jawaban * 2)
        $depScore = collect($answers)->slice(0, 7)->sum() * 2;
        $anxScore = collect($answers)->slice(7, 7)->sum() * 2;
        $strScore = collect($answers)->slice(14, 7)->sum() * 2;

        // Dummy Labeling
        $dummyData = [
            'depression_score' => $depScore,
            'depression_level' => $depScore > 9 ? 'Sedang' : 'Ringan',
            'anxiety_score' => $anxScore,
            'anxiety_level' => $anxScore > 7 ? 'Parah' : 'Normal',
            'stress_score' => $strScore,
            'stress_level' => $strScore > 14 ? 'Berat' : 'Ringan',
            'ml_label' => 'Stress',
            'gemini_recommendation' => 'Berdasarkan cerita kamu: "' . $vent . '", kami menyarankan teknik breathing 4-7-8 dan kurangi kafein.',
            'average_score' => ($depScore + $anxScore + $strScore) / 3,
            'final_level' => 'Butuh Perhatian'
        ];
        // ---------------------------------------------------------

        // 3. Simpan ke Database MySQL
        $result = EvaluationResult::create([
            'user_id' => Auth::id(),
            'depression_score' => $dummyData['depression_score'],
            'depression_level' => $dummyData['depression_level'],
            'anxiety_score' => $dummyData['anxiety_score'],
            'anxiety_level' => $dummyData['anxiety_level'],
            'stress_score' => $dummyData['stress_score'],
            'stress_level' => $dummyData['stress_level'],
            'ml_label' => $dummyData['ml_label'],
            'gemini_recommendation' => $dummyData['gemini_recommendation'],
            'average_score' => $dummyData['average_score'],
            'final_level' => $dummyData['final_level'],
        ]);

        // 4. Redirect ke Hasil
        return redirect()->route('evaluation.result', ['id' => $result->id]);
    }

    // 7. Halaman Hasil
    public function showResult($id)
    {
        $result = EvaluationResult::where('user_id', Auth::id())->findOrFail($id);
        return view('user.self-evaluation-results', compact('result'));
    }
}
