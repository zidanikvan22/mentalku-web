@extends('layout.mainUser')

@section('title', 'Edukasi - MentalKU')

@section('content')
    <div class="pt-24 lg:pt-32"></div>

    <section class="container mx-auto px-4 md:px-10 mb-20">

        <div class="text-center max-w-3xl mx-auto mb-12 animate-fade-in-up">
            <h1 class="text-3xl md:text-4xl font-extrabold text-[#294C60] mb-4 leading-tight">
                Edukasi Mengenai <span class="text-[#0D9488]">Kesehatan Mental</span>
            </h1>
            <p class="text-slate-500 text-lg">
                Temukan artikel, tips, dan wawasan terbaru untuk menjaga kesejahteraan pikiran Anda.
            </p>
        </div>

        <div
            class="flex flex-wrap justify-center gap-3 mb-12 animate-fade-in-up delay-100 overflow-x-auto pb-4 md:pb-0 px-4 md:px-0">

            <button
                class="btn bg-[#0D9488] hover:bg-teal-700 text-white border-none rounded-full px-8 normal-case text-base font-bold shadow-md shadow-teal-100 transition-transform hover:-translate-y-1">
                Semua
            </button>

            <button
                class="btn bg-white hover:bg-[#E0F2FE] hover:border-[#0D9488] hover:text-[#0D9488] text-slate-500 border border-slate-200 rounded-full px-8 normal-case text-base font-medium transition-all">
                Depresi
            </button>

            <button
                class="btn bg-white hover:bg-[#E0F2FE] hover:border-[#0D9488] hover:text-[#0D9488] text-slate-500 border border-slate-200 rounded-full px-8 normal-case text-base font-medium transition-all">
                Stres
            </button>

            <button
                class="btn bg-white hover:bg-[#E0F2FE] hover:border-[#0D9488] hover:text-[#0D9488] text-slate-500 border border-slate-200 rounded-full px-8 normal-case text-base font-medium transition-all">
                Kecemasan
            </button>

            <button
                class="btn bg-white hover:bg-[#E0F2FE] hover:border-[#0D9488] hover:text-[#0D9488] text-slate-500 border border-slate-200 rounded-full px-8 normal-case text-base font-medium transition-all">
                Self Care
            </button>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 animate-fade-in-up delay-200">

            @for ($i = 0; $i < 8; $i++)
                <a href="#"
                    class="group bg-white rounded-[24px] overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl hover:border-[#9BCDE6] transition-all duration-300 flex flex-col h-full">

                    <div class="h-48 bg-[#F0F9FF] relative overflow-hidden">
                        <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}" alt="Thumbnail Artikel"
                            class="w-full h-full object-contain p-8 group-hover:scale-110 transition-transform duration-500">

                        <div
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-[#0D9488] shadow-sm">
                            TIPS
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>20 Juli 2024</span>
                            <span>•</span>
                            <span>Admin</span>
                        </div>

                        <h3
                            class="text-lg font-bold text-[#294C60] mb-3 leading-snug group-hover:text-[#FF8966] transition-colors line-clamp-2">
                            Mengapa Self-Care Bukan Sekadar Tren, Tapi Kebutuhan?
                        </h3>

                        <p class="text-slate-500 text-sm mb-4 line-clamp-3 leading-relaxed flex-grow">
                            "Lorem ipsum dolor sit amet" adalah teks tiruan atau dummy text yang tidak memiliki arti
                            spesifik dalam bahasa apapun.
                        </p>

                        <div
                            class="mt-auto flex items-center text-[#FF8966] text-sm font-bold group-hover:translate-x-2 transition-transform">
                            Baca Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>
            @endfor

        </div>

        <div class="flex justify-center mt-16 animate-fade-in-up delay-300">
            <div class="join shadow-sm">
                <button
                    class="join-item btn btn-sm bg-white border-slate-200 text-slate-400 hover:bg-[#E0F2FE] hover:text-[#294C60]">«</button>
                <button class="join-item btn btn-sm bg-[#294C60] text-white border-[#294C60]">1</button>
                <button class="join-item btn btn-sm bg-white border-slate-200 hover:bg-[#E0F2FE] text-[#294C60]">2</button>
                <button class="join-item btn btn-sm bg-white border-slate-200 hover:bg-[#E0F2FE] text-[#294C60]">3</button>
                <button class="join-item btn btn-sm bg-white border-slate-200 hover:bg-[#E0F2FE] text-[#294C60]">4</button>
                <button
                    class="join-item btn btn-sm bg-white border-slate-200 text-slate-400 hover:bg-[#E0F2FE] hover:text-[#294C60]">»</button>
            </div>
        </div>

    </section>
@endsection
