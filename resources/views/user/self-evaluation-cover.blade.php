@extends('layout.mainUser')

@section('title', 'Dashboard - MentalKU')

@section('content')
    {{-- 
        NOTE: The style calc() below assumes a Navbar height of 80px and Footer height of 64px. 
        Please adjust these values to match your actual component heights. 
        The margin-top (mt-[80px]) pushes the content below the fixed navbar.
    --}}
    <section class="container mx-auto px-4 py-10 md:px-0 flex flex-col justify-center items-center"
        style="min-height: calc(100vh - 160px); margin-top: 70px;">

        <div
            class="w-full max-w-[1100px] bg-white rounded-[30px] shadow-2xl overflow-hidden border border-slate-100 flex flex-col lg:flex-row animate-fade-in-up">

            {{-- Left Column (Visuals) --}}
            <div
                class="w-full lg:w-5/12 bg-[#E0F2FE] relative flex flex-col items-center justify-center p-6 lg:p-10 text-center">

                <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                </div>

                {{-- Image scaled down for compact fit --}}
                <img src="{{ asset('assets/img/illustrations/ilustrasi_v2.png') }}" alt="Brain Illustration"
                    class="w-48 md:w-56 mb-6 drop-shadow-xl relative z-10 hover:scale-105 transition-transform duration-500">

                <div class="grid grid-cols-2 gap-3 w-full max-w-[250px] relative z-10">
                    <div class="bg-white/60 backdrop-blur-sm p-3 rounded-xl shadow-sm">
                        <p class="text-2xl font-bold text-[#294C60]">21</p>
                        <p class="text-[10px] text-slate-500 font-medium uppercase tracking-wider">Pertanyaan</p>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm p-3 rounded-xl shadow-sm">
                        <p class="text-2xl font-bold text-[#0D9488]">5</p>
                        <p class="text-[10px] text-slate-500 font-medium uppercase tracking-wider">Menit</p>
                    </div>
                </div>
            </div>

            {{-- Right Column (Content) --}}
            <div class="w-full lg:w-7/12 p-6 lg:p-10 flex flex-col justify-center text-left">

                <h1 class="text-2xl md:text-3xl font-extrabold text-[#294C60] mb-2 leading-tight">
                    Pahami Diri Lebih Dalam.
                    <span class="block text-base md:text-lg font-medium text-[#0D9488] mt-1">
                        Ruang Aman untuk Menilai & Merasa.
                    </span>
                </h1>

                <p class="text-slate-500 mb-6 text-sm leading-relaxed">
                    Selamat datang di MentalKU. Langkah awal menuju kesejahteraan dimulai dari pemahaman.
                    Kami memadukan metode ilmiah dan ruang ekspresi bebas tanpa penghakiman.
                </p>

                {{-- Compacted List --}}
                <div class="space-y-4 mb-8">

                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center shrink-0 text-[#294C60]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-[#294C60]">Asesmen Terukur (DASS-21)</h4>
                            <p class="text-xs text-slate-500 mt-0.5">
                                Mengukur tingkat Depresi, Kecemasan, dan Stres secara objektif melalui 21 pertanyaan standar
                                psikologi.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center shrink-0 text-[#FF8966]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-[#294C60]">Ruang Bercerita</h4>
                            <p class="text-xs text-slate-500 mt-0.5">
                                Kolom teks terbuka untuk menumpahkan segala beban pikiran Anda. Rahasia, aman, dan
                                melegakan.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col md:flex-row gap-3 items-center">
                    <a href="#"
                        class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-8 py-3 h-auto text-base shadow-lg hover:shadow-orange-200/50 w-full md:w-auto transition-all transform hover:-translate-y-1">
                        Mulai Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>

                    <p class="text-[10px] text-slate-400 font-medium">
                        *Estimasi waktu pengerjaan: 3-5 menit
                    </p>
                </div>

            </div>
        </div>
    </section>
@endsection
