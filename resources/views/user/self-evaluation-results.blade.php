@extends('layout.mainUser')

@section('title', 'Hasil Evaluasi - MentalKU')

@section('content')
    <div class="pt-24 lg:pt-32"></div>

    <section class="container mx-auto px-4 md:px-10 mb-20">

        <div class="text-center max-w-3xl mx-auto mb-12 animate-fade-in-up">
            <h1 class="text-3xl md:text-4xl font-extrabold text-[#294C60] mb-4">
                Hasil Skrining Kesehatan Mental
            </h1>
            <p class="text-slate-500 text-lg leading-relaxed">
                Berikut adalah gambaran kondisi Anda berdasarkan jawaban kuesioner DASS-21.
                Ingat, ini hanyalah skrining awal, <span class="font-bold text-[#FF8966]">bukan diagnosis medis final.</span>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 animate-fade-in-up delay-100">

            <div
                class="bg-white rounded-[30px] p-8 shadow-xl border-t-8 border-[#294C60] flex flex-col items-center hover:-translate-y-2 transition-transform duration-300">
                <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mb-4 text-[#294C60]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-700 mb-1">Depresi</h3>
                <span class="px-4 py-1 rounded-full bg-slate-100 text-[#294C60] text-sm font-bold mb-6">
                    Ringan
                </span>

                <div class="relative w-32 h-32 flex items-center justify-center">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                            fill="transparent" class="text-slate-100" />
                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                            fill="transparent" stroke-dasharray="351.86" stroke-dashoffset="100"
                            class="text-[#294C60] transition-all duration-1000 ease-out" />
                    </svg>
                    <div class="absolute text-center">
                        <span class="text-4xl font-extrabold text-[#294C60]">80</span>
                        <span class="block text-xs text-slate-400">Skor</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-[30px] p-8 shadow-2xl border-t-8 border-[#FF8966] flex flex-col items-center transform md:scale-105 z-10">
                <div class="w-16 h-16 rounded-full bg-orange-50 flex items-center justify-center mb-4 text-[#FF8966]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-700 mb-1">Stres</h3>
                <span
                    class="px-4 py-1 rounded-full bg-[#FF8966] text-white text-sm font-bold mb-6 shadow-md shadow-orange-200">
                    Sedang
                </span>

                <div class="relative w-32 h-32 flex items-center justify-center">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                            fill="transparent" class="text-orange-50" />
                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                            fill="transparent" stroke-dasharray="351.86" stroke-dashoffset="150"
                            class="text-[#FF8966] transition-all duration-1000 ease-out" />
                    </svg>
                    <div class="absolute text-center">
                        <span class="text-4xl font-extrabold text-[#FF8966]">80</span>
                        <span class="block text-xs text-slate-400">Skor</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white rounded-[30px] p-8 shadow-xl border-t-8 border-[#0D9488] flex flex-col items-center hover:-translate-y-2 transition-transform duration-300">
                <div class="w-16 h-16 rounded-full bg-teal-50 flex items-center justify-center mb-4 text-[#0D9488]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-700 mb-1">Kecemasan</h3>
                <span class="px-4 py-1 rounded-full bg-teal-50 text-[#0D9488] text-sm font-bold mb-6">
                    Ringan
                </span>

                <div class="relative w-32 h-32 flex items-center justify-center">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                            fill="transparent" class="text-teal-50" />
                        <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8"
                            fill="transparent" stroke-dasharray="351.86" stroke-dashoffset="100"
                            class="text-[#0D9488] transition-all duration-1000 ease-out" />
                    </svg>
                    <div class="absolute text-center">
                        <span class="text-4xl font-extrabold text-[#0D9488]">80</span>
                        <span class="block text-xs text-slate-400">Skor</span>
                    </div>
                </div>
            </div>

        </div>

        <div
            class="bg-gradient-to-br from-[#E0F2FE] to-white border border-[#BAE6FD] rounded-[30px] p-8 md:p-10 mb-10 shadow-lg relative overflow-hidden animate-fade-in-up delay-200">
            <div class="absolute top-0 right-0 p-6 opacity-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-[#294C60]" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-[#294C60] flex items-center justify-center text-white shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-[#294C60]">Rekomendasi Personalisasi (Gemini AI)</h2>
                </div>

                <div
                    class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-white/50 text-slate-600 leading-relaxed font-medium">
                    <p>
                        "Halo! Berdasarkan hasil skrining, sepertinya kamu sedang mengalami tingkat stres menengah. Ini
                        wajar terjadi saat beban akademik atau pekerjaan menumpuk. Coba teknik pernapasan 4-7-8 untuk
                        meredakan ketegangan, dan jangan ragu untuk istirahat sejenak dari layar gadget. Ingat, kesehatanmu
                        adalah prioritas utama."
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center gap-6 mb-16 animate-fade-in-up delay-300">
            <div
                class="bg-red-50 border border-red-100 px-6 py-3 rounded-xl text-red-500 text-sm flex items-start gap-2 max-w-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mt-0.5" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                <p><strong>Catatan Penting:</strong> Hasil ini tidak menggantikan diagnosis profesional. Jika Anda merasa
                    dalam bahaya atau butuh bantuan segera, hubungi profesional.</p>
            </div>

            <div class="flex flex-col md:flex-row gap-4 w-full justify-center">
                <a href="/question"
                    class="btn btn-outline border-slate-300 text-slate-500 hover:bg-slate-50 hover:border-slate-400 rounded-full px-8 normal-case text-lg font-medium">
                    Tes Ulang
                </a>
                <a href="/"
                    class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-10 shadow-lg hover:shadow-orange-200/50 normal-case text-lg">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>

        <div class="mb-10 animate-fade-in-up delay-500">
            <div class="flex items-center gap-4 mb-8">
                <div class="h-px bg-slate-200 flex-grow"></div>
                <h3 class="text-2xl font-bold text-[#294C60]">Bacaan Terkait</h3>
                <div class="h-px bg-slate-200 flex-grow"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl transition-all duration-300">
                    <div class="h-48 bg-[#CFE8F3] relative overflow-hidden">
                        <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}"
                            class="w-full h-full object-contain p-6 group-hover:scale-110 transition-transform duration-500"
                            alt="Article">
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-bold text-[#0D9488] uppercase tracking-wider mb-2 block">Tips</span>
                        <h4
                            class="text-xl font-bold text-[#294C60] mb-3 leading-tight group-hover:text-[#FF8966] transition-colors">
                            Cara Mengatasi Burnout Akademik
                        </h4>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">
                            Merasa lelah terus-menerus karena tugas kuliah? Simak strategi efektif untuk bangkit kembali.
                        </p>
                        <a href="#" class="text-[#FF8966] font-bold text-sm hover:underline">Baca Selengkapnya
                            &rarr;</a>
                    </div>
                </div>

                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl transition-all duration-300">
                    <div class="h-48 bg-[#F0FDF4] relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-50">
                        </div>
                        <div class="w-full h-full flex items-center justify-center text-[#0D9488] text-4xl font-bold">
                            MentalKU</div>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-bold text-[#0D9488] uppercase tracking-wider mb-2 block">Edukasi</span>
                        <h4
                            class="text-xl font-bold text-[#294C60] mb-3 leading-tight group-hover:text-[#FF8966] transition-colors">
                            Mengenal Gejala Awal Depresi
                        </h4>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">
                            Pahami tanda-tanda yang sering diabaikan dan kapan waktu yang tepat mencari bantuan profesional.
                        </p>
                        <a href="#" class="text-[#FF8966] font-bold text-sm hover:underline">Baca Selengkapnya
                            &rarr;</a>
                    </div>
                </div>

                <div
                    class="group bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl transition-all duration-300">
                    <div class="h-48 bg-[#FFF7ED] relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-50">
                        </div>
                        <div class="w-full h-full flex items-center justify-center text-[#FF8966] text-4xl font-bold">Tips
                        </div>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-bold text-[#0D9488] uppercase tracking-wider mb-2 block">Lifestyle</span>
                        <h4
                            class="text-xl font-bold text-[#294C60] mb-3 leading-tight group-hover:text-[#FF8966] transition-colors">
                            Meditasi 5 Menit Sehari
                        </h4>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-2">
                            Teknik sederhana yang bisa dilakukan di sela-sela kesibukan untuk menjaga kewarasan.
                        </p>
                        <a href="#" class="text-[#FF8966] font-bold text-sm hover:underline">Baca Selengkapnya
                            &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
