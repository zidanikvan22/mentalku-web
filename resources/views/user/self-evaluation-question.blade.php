@extends('layout.mainUser')

@section('title', 'Kuesioner - MentalKU')

@section('content')
{{-- LOGIC SETUP & DATA PERTANYAAN (PHP Block) --}}
@php
// 1. Setup Judul per Halaman
$titles = [
1 => 'Tingkat Stres',
2 => 'Tingkat Kecemasan',
3 => 'Tingkat Depresi'
];

// 2. Data Pertanyaan ASLI (Mapping dari question.txt)
// Format: [Nomor Urut => Teks Soal]
// Page 1 (Stres): 1-7
// Page 2 (Kecemasan): 8-14
// Page 3 (Depresi): 15-21
$questions = [
// --- BAGIAN 1: STRES (S1-S7) ---
1 => 'Saya merasa sulit untuk beristirahat.',
2 => 'Saya cenderung menunjukkan reaksi berlebihan terhadap suatu situasi.',
3 => 'Saya merasa energi saya terkuras karena terlalu cemas.',
4 => 'Saya merasa gelisah.',
5 => 'Saya merasa sulit untuk merasa tenang.',
6 => 'Saya sulit bersabar dalam menghadapi gangguan yang terjadi ketika sedang melakukan sesuatu.',
7 => 'Perasaan saya mudah tergugah atau tersentuh.',

// --- BAGIAN 2: KECEMASAN (A1-A7) ---
8 => 'Saya merasa rongga mulut saya kering.',
9 => 'Saya merasa kesulitan bernapas (misalnya sering terengah-engah atau tidak dapat bernapas padahal tidak melakukan aktivitas fisik sebelumnya).',
10 => 'Saya merasa gemetar (misalnya pada tangan).',
11 => 'Saya merasa khawatir dengan situasi di mana saya mungkin menjadi panik dan mempermalukan diri sendiri.',
12 => 'Saya merasa hampir panik.',
13 => 'Saya menyadari kondisi jantung saya (seperti meningkatnya atau melemahnya detak jantung) meskipun sedang tidak melakukan aktivitas fisik.',
14 => 'Saya merasa ketakutan tanpa alasan yang jelas.',

// --- BAGIAN 3: DEPRESI (D1-D7) ---
15 => 'Saya sama sekali tidak dapat merasakan perasaan positif (contoh: merasa gembira, bangga, dsb).',
16 => 'Saya merasa sulit berinisiatif melakukan sesuatu.',
17 => 'Saya merasa tidak ada lagi yang bisa saya harapkan.',
18 => 'Saya merasa sedih dan tertekan.',
19 => 'Saya tidak bisa merasa antusias terhadap hal apapun.',
20 => 'Saya merasa diri saya tidak berharga.',
21 => 'Saya merasa hidup ini tidak berarti.'
];

// 3. Hitung range nomor soal untuk halaman ini
$startNum = ($page - 1) * 7 + 1;
$endNum = $startNum + 6;

// 4. Progress Bar (33%, 66%, 100%)
$progress = ($page / 3) * 100;
@endphp

<section class="min-h-screen pt-20 pb-4 flex flex-col justify-center items-center bg-[#F8FAFC] px-4">

    {{-- BUNGKUS DENGAN FORM POST KE CONTROLLER --}}
    <form action="{{ route('evaluation.store', ['page' => $page]) }}" method="POST" class="w-full max-w-4xl h-full flex flex-col">
        @csrf

        <div class="bg-white rounded-[32px] shadow-xl border border-slate-100 overflow-hidden flex flex-col max-h-[85vh] animate-fade-in-up">

            {{-- A. Sticky Header --}}
            <div class="bg-white px-6 py-5 border-b border-slate-100 z-10 shrink-0">
                <div class="flex justify-between items-center mb-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#294C60]">Bagian {{ $page }}: {{ $titles[$page] }}</h2>
                        <p class="text-xs text-slate-400 mt-1">Jawab sesuai kondisi seminggu terakhir.</p>
                    </div>
                    <div class="text-right">
                        <span class="text-2xl font-extrabold text-[#0D9488]">{{ $page }}</span>
                        <span class="text-sm text-slate-400 font-medium">/ 3 Bagian</span>
                    </div>
                </div>

                {{-- Dynamic Progress Bar --}}
                <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#294C60] to-[#0D9488] h-2.5 rounded-full transition-all duration-500 ease-out shadow-[0_0_10px_rgba(13,148,136,0.5)]"
                        style="width: {{ $progress }}%"></div>
                </div>
            </div>

            {{-- B. Scrollable Content Area --}}
            <div class="overflow-y-auto p-6 md:p-8 space-y-8 bg-[#FAFCFF] overscroll-contain custom-scrollbar">

                {{-- DYNAMIC LOOPING QUESTIONS --}}
                @for ($i = $startNum; $i <= $endNum; $i++)
                    <div class="border-b border-slate-100 pb-6 last:border-0 last:pb-0">
                    {{-- Tampilkan Pertanyaan dari Array --}}
                    <p class="text-lg font-medium text-[#294C60] mb-4">
                        {{ $i }}. {{ $questions[$i] }}
                    </p>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        @php
                        $options = [
                        ['val' => 0, 'label' => 'Tidak Pernah', 'desc' => 'Tidak sesuai'],
                        ['val' => 1, 'label' => 'Kadang', 'desc' => 'Sedikit sesuai'],
                        ['val' => 2, 'label' => 'Sering', 'desc' => 'Cukup sering'],
                        ['val' => 3, 'label' => 'Selalu', 'desc' => 'Sangat sesuai'],
                        ];
                        @endphp

                        @foreach ($options as $opt)
                        <label class="cursor-pointer group relative">
                            {{-- LOGIC CHECKED: Cek apakah ada data di session --}}
                            <input type="radio" name="answer_{{ $i }}" value="{{ $opt['val'] }}"
                                class="peer sr-only" required
                                {{ isset($existingAnswers[$i]) && $existingAnswers[$i] == $opt['val'] ? 'checked' : '' }}>

                            <div class="p-3 rounded-xl border border-slate-200 bg-white hover:border-[#9BCDE6] hover:bg-[#F0F9FF] peer-checked:border-[#0D9488] peer-checked:bg-[#E0F2FE] peer-checked:ring-1 peer-checked:ring-[#0D9488] transition-all duration-200 flex flex-col items-center text-center h-full justify-center">
                                <span class="block text-sm font-bold text-[#294C60] group-hover:text-[#0D9488]">{{ $opt['label'] }}</span>
                                <span class="text-[10px] text-slate-400 mt-1">{{ $opt['desc'] }}</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
            </div>
            @endfor

        </div>

        {{-- C. Sticky Footer: Navigation --}}
        <div class="bg-white px-6 py-4 border-t border-slate-100 shrink-0 flex justify-between items-center shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">

            {{-- Tombol Kembali --}}
            @if($page > 1)
            <a href="{{ route('evaluation.question', ['page' => $page - 1]) }}"
                class="btn btn-sm md:btn-md btn-ghost text-slate-400 hover:text-[#294C60] rounded-full px-6 normal-case font-normal">
                Kembali
            </a>
            @else
            {{-- Kalau Page 1, Kembali ke Cover --}}
            <a href="{{ route('evaluation.cover') }}"
                class="btn btn-sm md:btn-md btn-ghost text-slate-400 hover:text-[#294C60] rounded-full px-6 normal-case font-normal">
                Batal
            </a>
            @endif

            {{-- Tombol Lanjut --}}
            <button type="submit"
                class="btn btn-sm md:btn-md bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-8 shadow-md hover:shadow-orange-200/50 normal-case font-bold tracking-wide">
                {{ $page < 3 ? 'Lanjut ke Bagian ' . ($page + 1) : 'Lanjut ke Cerita' }}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        </div>
    </form>
</section>

{{-- CSS Scrollbar --}}
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 20px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #94a3b8;
    }
</style>

@endsection