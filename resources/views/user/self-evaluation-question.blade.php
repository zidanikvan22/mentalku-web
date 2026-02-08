@extends('layout.mainUser')

@section('title', 'Kuesioner - MentalKU')

@section('content')
    {{-- 
    NOTE: Asumsi tinggi Navbar ~80px dan Footer ~60px. 
    Kita gunakan padding top untuk navbar, dan flex center untuk layout.
--}}
    <section class="min-h-screen pt-20 pb-4 flex flex-col justify-center items-center bg-[#F8FAFC] px-4">

        {{-- Main Card Container: Fixed Max Height untuk Laptop agar tidak scroll page --}}
        <div
            class="w-full max-w-4xl bg-white rounded-[32px] shadow-xl border border-slate-100 overflow-hidden flex flex-col max-h-[85vh] animate-fade-in-up">

            {{-- 1. Sticky Header: Progress Bar & Title --}}
            <div class="bg-white px-6 py-5 border-b border-slate-100 z-10 shrink-0">
                <div class="flex justify-between items-center mb-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#294C60]">Bagian 1: Tingkat Stres</h2>
                        <p class="text-xs text-slate-400 mt-1">Jawab sesuai kondisi seminggu terakhir.</p>
                    </div>
                    <div class="text-right">
                        <span class="text-2xl font-extrabold text-[#0D9488]">1</span>
                        <span class="text-sm text-slate-400 font-medium">/ 3 Bagian</span>
                    </div>
                </div>

                {{-- Improved Progress Bar --}}
                <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#294C60] to-[#0D9488] h-2.5 rounded-full transition-all duration-500 ease-out shadow-[0_0_10px_rgba(13,148,136,0.5)]"
                        style="width: 33%"></div>
                </div>
            </div>

            {{-- 2. Scrollable Content Area: Pertanyaan ada di sini --}}
            <div class="overflow-y-auto p-6 md:p-8 space-y-8 bg-[#FAFCFF] overscroll-contain custom-scrollbar">

                {{-- Loop Pertanyaan (Mockup 7 Item) --}}
                @for ($i = 1; $i <= 7; $i++)
                    <div class="border-b border-slate-100 pb-6 last:border-0 last:pb-0">
                        <p class="text-lg font-medium text-[#294C60] mb-4">
                            {{ $i }}. Saya merasa sulit untuk beristirahat atau menenangkan diri.
                        </p>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            {{-- Opsi Jawaban: Dibuat compact agar muat 7 pertanyaan --}}
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
                                    <input type="radio" name="answer_{{ $i }}" value="{{ $opt['val'] }}"
                                        class="peer sr-only">

                                    <div
                                        class="p-3 rounded-xl border border-slate-200 bg-white hover:border-[#9BCDE6] hover:bg-[#F0F9FF] peer-checked:border-[#0D9488] peer-checked:bg-[#E0F2FE] peer-checked:ring-1 peer-checked:ring-[#0D9488] transition-all duration-200 flex flex-col items-center text-center h-full justify-center">
                                        <span
                                            class="block text-sm font-bold text-[#294C60] group-hover:text-[#0D9488]">{{ $opt['label'] }}</span>
                                        <span class="text-[10px] text-slate-400 mt-1">{{ $opt['desc'] }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endfor

            </div>

            {{-- 3. Sticky Footer: Navigation Buttons --}}
            <div
                class="bg-white px-6 py-4 border-t border-slate-100 shrink-0 flex justify-between items-center shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                <button
                    class="btn btn-sm md:btn-md btn-ghost text-slate-400 hover:text-[#294C60] rounded-full px-6 normal-case font-normal">
                    Kembali
                </button>

                <button
                    class="btn btn-sm md:btn-md bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-8 shadow-md hover:shadow-orange-200/50 normal-case font-bold tracking-wide">
                    Lanjut ke Bagian 2
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

        </div>
    </section>

    {{-- Custom Scrollbar Style --}}
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
