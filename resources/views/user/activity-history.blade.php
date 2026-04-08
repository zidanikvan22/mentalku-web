@extends('layout.mainUser')

@section('title', 'Detail Riwayat Evaluasi - MentalKU')

@section('content')
<div class="pt-20 lg:pt-28"></div>

<section class="container mx-auto px-4 md:px-8 mb-16">

    {{-- HEADLINE --}}
    <div class="text-center max-w-3xl mx-auto mb-8 animate-fade-in-up">
        <h1 class="text-2xl md:text-3xl font-extrabold text-[#294C60] mb-2">
            Riwayat Skrining Kesehatan Mental
        </h1>
        <p class="text-slate-500 text-base leading-relaxed">
            Gambaran kondisi Anda berdasarkan DASS-21.
        </p>
        {{-- Informasi Kapan Tes Dilakukan --}}
        <p class="mt-2 inline-block px-4 py-1.5 bg-slate-100 rounded-full text-slate-600 text-sm font-semibold border border-slate-200">
            Tes Evaluasi Diri {{ $testNumber }} ini dilakukan pada {{ $result->created_at->translatedFormat('l, d F Y - H:i') }} WIB
        </p>
    </div>

    {{-- SCORE CARDS GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8 animate-fade-in-up delay-100 max-w-5xl mx-auto">

        {{-- CARD 1: DEPRESI --}}
        <div class="bg-white rounded-2xl p-5 shadow-lg border-t-4 border-[#294C60] flex flex-col items-center">
            <div class="flex items-center gap-3 mb-4 w-full justify-center border-b border-slate-100 pb-3">
                <h3 class="text-lg font-bold text-slate-700">Depresi</h3>
            </div>
            <div class="text-center mb-2">
                <span class="text-4xl font-extrabold text-[#294C60]">{{ $result->depression_score }}</span>
            </div>
            <span class="px-3 py-1 rounded-full bg-slate-100 text-[#294C60] text-xs font-bold">{{ $result->depression_level }}</span>
        </div>

        {{-- CARD 2: STRES --}}
        <div class="bg-white rounded-2xl p-5 shadow-xl border-t-4 border-[#FF8966] flex flex-col items-center transform md:-translate-y-2">
            <div class="flex items-center gap-3 mb-4 w-full justify-center border-b border-orange-50 pb-3">
                <h3 class="text-lg font-bold text-slate-700">Stres</h3>
            </div>
            <div class="text-center mb-2">
                <span class="text-4xl font-extrabold text-[#FF8966]">{{ $result->stress_score }}</span>
            </div>
            <span class="px-3 py-1 rounded-full bg-[#FF8966] text-white text-xs font-bold shadow-md shadow-orange-200">{{ $result->stress_level }}</span>
        </div>

        {{-- CARD 3: KECEMASAN --}}
        <div class="bg-white rounded-2xl p-5 shadow-lg border-t-4 border-[#0D9488] flex flex-col items-center">
            <div class="flex items-center gap-3 mb-4 w-full justify-center border-b border-teal-50 pb-3">
                <h3 class="text-lg font-bold text-slate-700">Kecemasan</h3>
            </div>
            <div class="text-center mb-2">
                <span class="text-4xl font-extrabold text-[#0D9488]">{{ $result->anxiety_score }}</span>
            </div>
            <span class="px-3 py-1 rounded-full bg-teal-50 text-[#0D9488] text-xs font-bold">{{ $result->anxiety_level }}</span>
        </div>

    </div>

    {{-- GEMINI AI SECTION --}}
    <div class="bg-gradient-to-r from-[#E0F2FE] to-white border border-[#BAE6FD] rounded-2xl p-6 mb-10 shadow-md relative overflow-hidden animate-fade-in-up delay-200 max-w-5xl mx-auto">
        <div class="relative z-10 flex flex-col md:flex-row items-start gap-6">
            <div class="flex md:flex-col items-center md:items-start gap-3 md:w-1/4 shrink-0 border-b md:border-b-0 md:border-r border-blue-200/50 pb-4 md:pb-0 md:pr-4">
                <div class="w-12 h-12 rounded-full bg-[#294C60] flex items-center justify-center text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-[#294C60] leading-tight">Rekomendasi Waktu Itu</h2>
                </div>
            </div>

            <div class="md:w-3/4">
                <style>
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
                <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4 md:p-6 border border-white/50 text-slate-700 font-medium text-sm md:text-base shadow-sm markdown-ai">
                    {!! Str::markdown($result->gemini_recommendation ?? 'Tidak ada rekomendasi tersimpan untuk sesi ini.') !!}
                </div>
            </div>
        </div>
    </div>

    {{-- MEDICAL & LEGAL DISCLAIMER --}}
    <div class="flex flex-col items-center gap-6 mb-12 animate-fade-in-up delay-300 max-w-4xl mx-auto">
        <div class="bg-rose-50 border-l-4 border-rose-500 p-5 rounded-r-xl shadow-sm text-rose-700 text-sm flex items-start gap-3 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 mt-0.5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <div class="leading-relaxed">
                <p class="font-bold text-base mb-1">Peringatan Medis & Legalitas</p>
                <p>
                    Sistem MentalKU dirancang secara eksklusif sebagai instrumen skrining awal (Self-Assessment) dan bukan merupakan alat diagnostik medis.
                    Sesuai dengan <strong>Undang-Undang No. 17 Tahun 2023 tentang Kesehatan</strong> dan <strong>Kode Etik Psikologi Indonesia (HIMPSI)</strong>, diagnosis klinis yang sah hanya dapat ditegakkan oleh tenaga profesional (Psikolog Klinis / Psikiater) melalui pemeriksaan psikologis secara komprehensif dan tatap muka. Jangan menggunakan hasil sistem ini untuk melakukan <em>self-diagnosis</em>.
                </p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full justify-center">
            <a href="{{ route('profile.index') }}" class="btn btn-outline border-slate-300 text-slate-500 hover:bg-slate-50 hover:border-slate-400 rounded-full px-8 min-h-[2.5rem] h-10 text-sm font-bold">
                Kembali ke Profil
            </a>
        </div>
    </div>

</section>
@endsection