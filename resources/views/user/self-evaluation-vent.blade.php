@extends('layout.mainUser')

@section('title', 'Ruang Bercerita - MentalKU')

@section('content')
    <div class="pt-24 lg:pt-32"></div>

    <section class="container mx-auto px-4 md:px-10 mb-20">

        <div
            class="max-w-5xl mx-auto bg-white rounded-[30px] md:rounded-[40px] shadow-2xl overflow-hidden border border-slate-100 flex flex-col lg:flex-row animate-fade-in-up">

            <div
                class="w-full lg:w-2/5 bg-[#E0F2FE] relative flex flex-col items-center justify-center p-8 lg:p-12 text-center lg:text-left order-1">

                <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                </div>

                <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}" alt="Writing Illustration"
                    class="w-40 md:w-56 mb-6 drop-shadow-xl relative z-10">

                <div class="relative z-10 max-w-xs mx-auto lg:mx-0">
                    <h2 class="text-2xl font-bold text-[#294C60] mb-2">Ruang Amanmu.</h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Tumpahkan segala yang mengganjal. Tidak ada penghakiman di sini. Tulisan ini adalah milikmu
                        sepenuhnya.
                    </p>

                    <div
                        class="inline-flex items-center gap-2 bg-white/70 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm text-[#0D9488] text-sm font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        100% Rahasia & Terenkripsi
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-3/5 p-6 md:p-12 order-2 flex flex-col">

                <div class="mb-6">
                    <h1 class="text-2xl md:text-3xl font-extrabold text-[#294C60]">Apa yang sedang kamu rasakan?</h1>
                    <p class="text-slate-400 mt-2">Jangan khawatir tentang tata bahasa. Tulis saja mengalir.</p>
                </div>

                <form action="#" method="POST" class="flex-grow flex flex-col">
                    @csrf

                    <div class="form-control flex-grow mb-6">
                        <textarea
                            class="textarea textarea-bordered h-full min-h-[250px] md:min-h-[300px] text-lg leading-relaxed p-6 resize-none rounded-2xl focus:outline-[#0D9488] border-slate-200 shadow-sm"
                            placeholder="Mulai menulis di sini... Contoh: 'Hari ini rasanya berat sekali karena...'"></textarea>
                    </div>

                    <div class="flex flex-col-reverse md:flex-row justify-end gap-4 items-center">

                        <a href="#"
                            class="btn btn-ghost text-slate-400 hover:text-[#294C60] normal-case w-full md:w-auto">
                            Lewati & Lihat Hasil
                        </a>

                        <button
                            class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-10 py-3 h-auto text-lg shadow-lg hover:shadow-orange-200/50 w-full md:w-auto flex items-center justify-center gap-2 transition-all transform hover:-translate-y-1">
                            <span>Simpan Cerita</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                            </svg>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
