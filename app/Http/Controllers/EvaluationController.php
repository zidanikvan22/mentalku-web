<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluationResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EvaluationController extends Controller
{
    // Cover Page: Reset session if user is starting fresh
    public function cover()
    {
        // Optional: Reset session upon entering
        // session()->forget(['evaluation_answers', 'evaluation_vent']);
        return view('user.self-evaluation-cover');
    }

    // Start Test: Clear all previous session data
    public function start()
    {
        // Remove old sessions to start fresh
        session()->forget(['evaluation_answers', 'evaluation_vent']);
        return redirect()->route('evaluation.question', ['page' => 1]);
    }

    // Display questions (Pages 1, 2, 3)
    public function question($page)
    {
        // Validate page parameter to only allow 1-3
        if ($page < 1 || $page > 3) {
            return redirect()->route('evaluation.cover');
        }

        // Retrieve previously saved answers from session to prevent data loss on back navigation
        $existingAnswers = session('evaluation_answers', []);

        return view('user.self-evaluation-question', [
            'page' => $page,
            'existingAnswers' => $existingAnswers
        ]);
    }

    // Save answers per page
    public function storeQuestion(Request $request, $page)
    {
        // Retrieve existing session data
        $answers = session('evaluation_answers', []);

        // Merge new answers from form into session array
        // Basic validation: loop through inputs named "answer_x"
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'answer_')) {
                // Extract question number from key (e.g., answer_5 -> 5)
                $questionNumber = (int) str_replace('answer_', '', $key);
                $answers[$questionNumber] = (int) $value;
            }
        }

        // Save updated data back to session
        session(['evaluation_answers' => $answers]);

        // Redirect logic
        if ($page < 3) {
            return redirect()->route('evaluation.question', ['page' => $page + 1]);
        } else {
            return redirect()->route('evaluation.vent'); // Redirect to venting page
        }
    }

    // Venting Page
    public function vent()
    {
        // ANTI-BACK BUTTON LOGIC:
        // Ensure user has exactly 21 answers in session. If not, they likely clicked 'Back' from the results page.
        $answersAssoc = session('evaluation_answers', []);
        if (count($answersAssoc) < 21) {
            return redirect()->route('evaluation.cover')->with('error', 'Sesi evaluasi sudah selesai atau tidak valid. Silakan mulai ulang.');
        }

        // Retrieve any previously typed venting text
        $existingVent = session('evaluation_vent', '');
        
        // APPLY NO-CACHE HEADERS TO PREVENT BROWSER CACHING ISSUES
        return response()
            ->view('user.self-evaluation-vent', compact('existingVent'))
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    // Final Submit & API Call
    public function submit(Request $request)
    {
        // Validate input data (required, min 10 chars, max 1000 chars)
        $request->validate([
            'vent' => 'required|string|min:10|max:1000'
        ], [
            'vent.required' => 'Ceritakan sedikit perasaanmu sebelum melihat hasil.',
            'vent.min' => 'Ceritamu terlalu singkat (minimal 10 karakter).',
            'vent.max' => 'Ceritamu terlalu panjang (maksimal 1000 karakter).'
        ]);

        // Save venting text to session
        session(['evaluation_vent' => $request->vent]);

        // Retrieve and format all data
        $answersAssoc = session('evaluation_answers', []);
        ksort($answersAssoc); // Ensure question numbers 1 to 21 are sequentially ordered
        $answers = array_values($answersAssoc); // Flatten into a pure array [0, 1, 2, ...]

        $vent = session('evaluation_vent', '');

        // Call Python API wrapped in Try-Catch to prevent crashes
        try {
            // Set 15 seconds timeout to prevent request timeout issues if model processing is slow
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::timeout(15)->post('http://127.0.0.1:8001/api/v1/evaluate', [
                'answers' => $answers,
                'vent_text' => $vent
            ]);

            // Check if HTTP response is 200 OK
            if ($response->successful()) {
                $data = $response->json();

                // Save results to MySQL database
                $result = EvaluationResult::create([
                    'user_id' => Auth::id(),
                    'depression_score' => $data['scores']['depression'],
                    'depression_level' => $data['levels']['depression'],
                    'anxiety_score' => $data['scores']['anxiety'],
                    'anxiety_level' => $data['levels']['anxiety'],
                    'stress_score' => $data['scores']['stress'],
                    'stress_level' => $data['levels']['stress'],
                    'ml_label' => $data['ml_analysis']['label'],
                    'vent_text' => $vent,
                    'gemini_recommendation' => $data['gemini']['recommendation'],
                    'average_score' => $data['average_score'],
                    'final_level' => $data['final_level'],
                ]);

                // Clear session data as evaluation is complete
                session()->forget(['evaluation_answers', 'evaluation_vent']);

                // Redirect to results page
                return redirect()->route('evaluation.result', ['id' => $result->id]);
            } else {
                // API responded but with an error (e.g., 400 Bad Request or 500 Internal Server Error)
                Log::error('API Python Error Response: ' . $response->body());
                return back()->with('error', 'Gagal memproses evaluasi. Pastikan kamu mengisi 21 soal dengan lengkap.');
            }

        } catch (\Exception $e) {
            // Python server is offline or connection timed out
            Log::error('API Python Connection Failed: ' . $e->getMessage());
            return back()->with('error', 'Server Evaluasi AI sedang sibuk atau offline. Silakan coba beberapa saat lagi.');
        }
    }

    // Results Page
    public function showResult($id)
    {
        $result = EvaluationResult::where('user_id', Auth::id())->findOrFail($id);

        // DUAL-MODALITY CATEGORY ENGINE
        // Map DASS-21 severity levels
        $severityMap = ['Normal' => 0, 'Ringan' => 1, 'Sedang' => 2, 'Parah' => 3, 'Sangat Parah' => 4];
        
        $dassIndices = [
            'Depresi' => $severityMap[$result->depression_level] ?? 0,
            'Kecemasan' => $severityMap[$result->anxiety_level] ?? 0,
            'Stres' => $severityMap[$result->stress_level] ?? 0,
        ];

        $maxIndex = max($dassIndices);
        $targetCategories = [];

        // Retrieve the most severe objective categories
        if ($maxIndex > 0) {
            foreach ($dassIndices as $category => $index) {
                if ($index == $maxIndex) {
                    $targetCategories[] = $category;
                }
            }
        }

        // Append subjective category from Machine Learning predictions
        if (!empty($result->ml_label) && $result->ml_label !== 'Normal') {
            $targetCategories[] = $result->ml_label;
        }

        // Remove duplicates (e.g., DASS = Depresi, LSTM = Depresi)
        $targetCategories = array_unique($targetCategories);

        // Fallback Protocol (If user is completely healthy)
        if (empty($targetCategories)) {
            $targetCategories = ['Rawat Diri'];
        }

        // Query execution: Retrieve 4 random articles relevant to the user's condition
        $relatedEducations = \App\Models\Education::whereIn('category', $targetCategories)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('user.self-evaluation-results', compact('result', 'relatedEducations'));
    }

    // Activity History Detail Page
    public function historyDetail($id)
    {
        $result = EvaluationResult::where('user_id', Auth::id())->findOrFail($id);
        
        // Calculate the chronological order of this test for the user
        $testNumber = EvaluationResult::where('user_id', Auth::id())
            ->where('created_at', '<=', $result->created_at)
            ->count();

        return view('user.activity-history', compact('result', 'testNumber'));
    }
}
