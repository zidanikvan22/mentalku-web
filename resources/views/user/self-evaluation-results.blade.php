@extends('layout.mainUser')

@section('title', 'Hasil Evaluasi - MentalKU')

@section('content')
    {{-- CSS untuk Animasi Circle Chart --}}
    <style>
        @keyframes progressAnimation {
            from {
                stroke-dashoffset: var(--start-offset);
            }

            to {
                stroke-dashoffset: var(--target-offset);
            }
        }

        .animate-progress {
            animation: progressAnimation 1.5s ease-out forwards;
        }
    </style>

    <div class="pt-20 lg:pt-28"></div>

    <section class="container mx-auto px-4 md:px-8 mb-16">

        {{-- HEADLINE --}}
        <div class="text-center max-w-3xl mx-auto mb-8 animate-fade-in-up">
            <h1 class="text-2xl md:text-3xl font-extrabold text-[#294C60] mb-2">
                Hasil Skrining Kesehatan Mental
            </h1>
            <p class="text-slate-500 text-base leading-relaxed">
                Gambaran kondisi Anda berdasarkan DASS-21.
                <span class="font-bold text-[#FF8966]">Bukan diagnosis medis final.</span>
            </p>
        </div>

        {{-- SCORE CARDS GRID (Dynamic Data) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8 animate-fade-in-up delay-100 max-w-5xl mx-auto">

            {{-- CARD 1: DEPRESI --}}
            <div
                class="bg-white rounded-2xl p-5 shadow-lg border-t-4 border-[#294C60] flex flex-col items-center hover:-translate-y-1 transition-transform duration-300">
                <div class="flex items-center gap-3 mb-4 w-full justify-center border-b border-slate-100 pb-3">
                    <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-[#294C60]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700">Depresi</h3>
                </div>

                <div class="relative w-24 h-24 flex items-center justify-center mb-2">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="6"
                            fill="transparent" class="text-slate-100" />
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="6"
                            fill="transparent" stroke-dasharray="251" stroke-dashoffset="251"
                            style="--start-offset: 251;--target-offset: {{ max(0, 251 - ($result->depression_score / 42) * 251) }};"
                            class="text-[#294C60] animate-progress" />
                    </svg>
                    <div class="absolute text-center">
                        <span class="text-2xl font-extrabold text-[#294C60]">{{ $result->depression_score }}</span>
                    </div>
                </div>
                <span
                    class="px-3 py-1 rounded-full bg-slate-100 text-[#294C60] text-xs font-bold">{{ $result->depression_level }}</span>
            </div>

            {{-- CARD 2: STRES --}}
            <div
                class="bg-white rounded-2xl p-5 shadow-xl border-t-4 border-[#FF8966] flex flex-col items-center relative z-10">
                <div class="flex items-center gap-3 mb-4 w-full justify-center border-b border-orange-50 pb-3">
                    <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center text-[#FF8966]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700">Stres</h3>
                </div>

                <div class="relative w-28 h-28 flex items-center justify-center mb-2">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="56" cy="56" r="46" stroke="currentColor" stroke-width="7"
                            fill="transparent" class="text-orange-50" />
                        <circle cx="56" cy="56" r="46" stroke="currentColor" stroke-width="7"
                            fill="transparent" stroke-dasharray="289" stroke-dashoffset="289"
                            style="--start-offset: 289; --target-offset: {{ max(0, 289 - ($result->stress_score / 42) * 289) }};"
                            class="text-[#FF8966] animate-progress" />
                    </svg>
                    <div class="absolute text-center">
                        <span class="text-3xl font-extrabold text-[#FF8966]">{{ $result->stress_score }}</span>
                    </div>
                </div>
                <span
                    class="px-3 py-1 rounded-full bg-[#FF8966] text-white text-xs font-bold shadow-md shadow-orange-200">{{ $result->stress_level }}</span>
            </div>

            {{-- CARD 3: KECEMASAN --}}
            <div
                class="bg-white rounded-2xl p-5 shadow-lg border-t-4 border-[#0D9488] flex flex-col items-center hover:-translate-y-1 transition-transform duration-300">
                <div class="flex items-center gap-3 mb-4 w-full justify-center border-b border-teal-50 pb-3">
                    <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center text-[#0D9488]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700">Kecemasan</h3>
                </div>

                <div class="relative w-24 h-24 flex items-center justify-center mb-2">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="6"
                            fill="transparent" class="text-teal-50" />
                        <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="6"
                            fill="transparent" stroke-dasharray="251" stroke-dashoffset="251"
                            style="--start-offset: 251; --target-offset: {{ max(0, 251 - ($result->anxiety_score / 42) * 251) }};"
                            class="text-[#0D9488] animate-progress" />
                    </svg>
                    <div class="absolute text-center">
                        <span class="text-2xl font-extrabold text-[#0D9488]">{{ $result->anxiety_score }}</span>
                    </div>
                </div>
                <span
                    class="px-3 py-1 rounded-full bg-teal-50 text-[#0D9488] text-xs font-bold">{{ $result->anxiety_level }}</span>
            </div>

        </div>

        {{-- GEMINI AI SECTION (Horizontal Compact) --}}
        <div
            class="bg-gradient-to-r from-[#E0F2FE] to-white border border-[#BAE6FD] rounded-2xl p-6 mb-10 shadow-md relative overflow-hidden animate-fade-in-up delay-200 max-w-5xl mx-auto">
            <div class="absolute -right-10 -top-10 opacity-10 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-[#294C60]" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>

            <div class="relative z-10 flex flex-col md:flex-row items-start gap-6">
                {{-- Left: Header/Icon --}}
                <div
                    class="flex md:flex-col items-center md:items-start gap-3 md:w-1/4 shrink-0 border-b md:border-b-0 md:border-r border-blue-200/50 pb-4 md:pb-0 md:pr-4">
                    <div class="w-12 h-12 rounded-full bg-[#294C60] flex items-center justify-center text-white shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-[#294C60] leading-tight">Rekomendasi Personalisasi</h2>
                        <span
                            class="text-xs font-medium text-[#0D9488] bg-white/50 px-2 py-0.5 rounded-full mt-1 inline-block">Powered
                            by Gemini AI</span>
                    </div>
                </div>

                {{-- Right: Content --}}
                {{-- Right: Content --}}
                <div class="md:w-3/4">
                    <style>
                        /* CSS Khusus buat ngerapihin Markdown bawaan Gemini */
                        .markdown-ai ul {
                            list-style-type: disc;
                            padding-left: 1.5rem;
                            margin-bottom: 1rem;
                        }

                        .markdown-ai ol {
                            list-style-type: decimal;
                            padding-left: 1.5rem;
                            margin-bottom: 1rem;
                        }

                        .markdown-ai li {
                            margin-bottom: 0.5rem;
                            line-height: 1.6;
                        }

                        .markdown-ai strong {
                            color: #1e293b;
                            font-weight: 700;
                        }

                        .markdown-ai p {
                            margin-bottom: 1rem;
                            line-height: 1.6;
                        }
                    </style>

                    <div
                        class="bg-white/60 backdrop-blur-sm rounded-xl p-4 md:p-6 border border-white/50 text-slate-700 font-medium text-sm md:text-base shadow-sm markdown-ai">
                        {{-- Menggunakan Str::markdown untuk memparsing sintaks AI ke HTML --}}
                        {!! Str::markdown($result->gemini_recommendation) !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- ACTION BUTTONS & DISCLAIMER --}}
        <div class="flex flex-col items-center gap-6 mb-12 animate-fade-in-up delay-300 max-w-4xl mx-auto">
            <div
                class="bg-rose-50 border-l-4 border-rose-500 p-5 rounded-r-xl shadow-sm text-rose-700 text-sm flex items-start gap-3 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 mt-0.5 text-rose-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div class="leading-relaxed">
                    <p class="font-bold text-base mb-1">Peringatan Medis & Legalitas</p>
                    <p>
                        Sistem MentalKU dirancang secara eksklusif sebagai instrumen skrining awal (Self-Assessment) dan
                        bukan merupakan alat diagnostik medis.
                        Sesuai dengan <strong>Undang-Undang No. 17 Tahun 2023 tentang Kesehatan</strong> dan <strong>Kode
                            Etik Psikologi Indonesia (HIMPSI)</strong>, diagnosis klinis yang sah hanya dapat ditegakkan
                        oleh tenaga profesional (Psikolog Klinis / Psikiater) melalui pemeriksaan psikologis secara
                        komprehensif dan tatap muka. Jangan menggunakan hasil sistem ini untuk melakukan
                        <em>self-diagnosis</em>.
                    </p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 w-full justify-center">
                <a href="/question"
                    class="btn btn-outline border-slate-300 text-slate-500 hover:bg-slate-50 hover:border-slate-400 rounded-full px-8 min-h-[2.5rem] h-10 text-sm font-bold">
                    Tes Ulang
                </a>
                <a href="/"
                    class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-8 shadow-md hover:shadow-orange-200/50 min-h-[2.5rem] h-10 text-sm">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>

        {{-- BACAAN TERKAIT (4 COLUMNS GRID) --}}
        <div class="mb-10 animate-fade-in-up delay-500">
            <div class="flex items-center gap-4 mb-6">
                <div class="h-px bg-slate-200 flex-grow"></div>
                <h3 class="text-xl font-bold text-[#294C60]">Bacaan Terkait</h3>
                <div class="h-px bg-slate-200 flex-grow"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                @forelse ($relatedEducations as $item)
                    {{-- Dynamic Card Item --}}
                    <a href="{{ $item->external_url }}" target="_blank"
                        class="group bg-white rounded-2xl overflow-hidden shadow-md border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                        <div class="h-32 bg-[#F0F9FF] relative overflow-hidden shrink-0">
                            @php
                                $imgSrc = Str::startsWith($item->image_path, 'http')
                                    ? $item->image_path
                                    : asset('assets/img/education/' . $item->image_path);
                            @endphp
                            <img src="{{ $imgSrc }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                alt="{{ $item->title }}">
                        </div>

                        <div class="p-4 flex flex-col flex-grow">
                            <span
                                class="text-[10px] font-bold text-[#0D9488] uppercase tracking-wider mb-1 block">{{ $item->category }}</span>
                            <h4
                                class="text-base font-bold text-[#294C60] mb-2 leading-tight group-hover:text-[#FF8966] transition-colors line-clamp-2">
                                {{ $item->title }}
                            </h4>
                            <p class="text-slate-500 text-xs mb-4 line-clamp-2 flex-grow">
                                {{ $item->excerpt }}
                            </p>
                            <span
                                class="text-[#FF8966] font-bold text-xs group-hover:translate-x-1 transition-transform mt-auto flex items-center">
                                Baca Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-slate-500 text-sm">
                        Belum ada artikel terkait yang tersedia saat ini.
                    </div>
                @endforelse

            </div>
        </div>

    </section>
@endsection
