@extends('layout.mainUser')

@section('title', 'Dashboard - MentalKU')

@section('content')
    {{-- Spacer adjustment: Lebih rapat biar gak terlalu jauh dari navbar --}}
    <div class="pt-24 lg:pt-28"></div>

    {{-- HERO SECTION --}}
    <section class="container mx-auto px-6 md:px-16 mb-12">
        {{-- Container tetap 'New Code' (max-w-6xl, rounded, dll) --}}
        <div
            class="w-full max-w-6xl mx-auto bg-[#E0F2FE] rounded-[30px] md:rounded-[60px] shadow-2xl overflow-hidden relative">

            {{-- REVISI GRID: Balik ke rasio 'Old Code' (5 kolom) biar posisi persis --}}
            <div class="grid grid-cols-1 lg:grid-cols-5 min-h-auto lg:min-h-[500px]">

                {{-- Text Content --}}
                <div
                    class="lg:col-span-3 px-6 pt-2 pb-10 md:px-12 md:py-16 flex flex-col justify-center text-center lg:text-left items-center lg:items-start order-2 lg:order-1 relative z-10">

                    {{-- H1 dengan Negative Margin Mobile --}}
                    <h1
                        class="-mt-16 md:-mt-0 text-3xl md:text-4xl lg:text-5xl font-extrabold leading-tight tracking-tight text-[#294C60] mb-4">
                        Temukan Ketenangan.
                        <span class="bg-gradient-to-r from-[#294C60] to-[#0D9488] bg-clip-text text-transparent block mt-1">
                            Pahami Diri Anda.
                        </span>
                    </h1>

                    <h2 class="text-lg md:text-2xl font-bold text-[#FF8966] mb-4 leading-snug">
                        Mulai Perjalanan Anda dengan Tes MentalKU.
                    </h2>

                    <p class="text-slate-600 font-normal text-sm md:text-base leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                        Skrining awal yang cepat dan aman hadir untuk Anda. Jawab 21 pertanyaan singkat, dapatkan wawasan
                        akurat mengenai tingkat stres, kecemasan, dan depresi, serta temukan panduan awal untuk
                        kesejahteraan diri Anda.
                    </p>

                    <div class="flex w-full justify-center lg:justify-start">
                        <button
                            class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-8 h-12 min-h-[3rem] text-sm md:text-base font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all w-full md:w-auto">
                            Mulai Tes MentalKU
                        </button>
                    </div>
                </div>

                {{-- Image Content: Ambil 2/5 bagian (lg:col-span-2) --}}
                {{-- REVISI: Balikin styling container & image biar 'sejajar' kayak lama --}}
                <div
                    class="lg:col-span-2 relative flex items-start lg:items-center justify-center order-1 lg:order-2 border-l-0 lg:border-l-4 border-white/40 px-8 lg:py-0">

                    {{-- Pattern Background --}}
                    <div
                        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-multiply">
                    </div>

                    {{-- REVISI IMAGE: Hapus fixed height (h-80). Balik ke w-full dengan max-w biar skala-nya bener --}}
                    <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}" alt="Mental Health Illustration"
                        loading="lazy"
                        class="-mt-12 md:-mt-0 w-full max-w-[280px] md:max-w-[360px] object-contain drop-shadow-xl relative z-20 animate-fade-in-up">
                </div>

            </div>
        </div>
    </section>

    {{-- INFO SECTION --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight">
                Apa yang Perlu Anda Ketahui Sebelum Tes?
            </h2>
        </div>

        {{-- Grid: Gap dikecilin (gap-5), padding card dikurangi biar compact --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 max-w-6xl mx-auto">
            <div
                class="bg-[#FEFBF5] rounded-2xl p-6 flex flex-col items-start gap-3 hover:shadow-md transition-shadow border border-orange-50/50">
                <div class="text-3xl bg-white p-2 rounded-lg shadow-sm">🧐</div>
                <div>
                    <h3 class="font-bold text-lg text-slate-900 mb-1">Fokus Skrining MentalKU?</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Tes Mentalku berfokus pada Depresi, Kecemasan, dan Stres melalui kuesioner DASS-21. Jawab 21
                        pertanyaan dengan skala 0-3 untuk mendapatkan gambaran awal kondisi emosional Anda.
                    </p>
                </div>
            </div>

            <div
                class="bg-[#FEFBF5] rounded-2xl p-6 flex flex-col items-start gap-3 hover:shadow-md transition-shadow border border-orange-50/50">
                <div class="text-3xl bg-white p-2 rounded-lg shadow-sm">📢</div>
                <div>
                    <h3 class="font-bold text-lg text-slate-900 mb-1">Bukan Diagnosis Medis</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Hasil dari Tes Mentalku hanya berfungsi sebagai skrining awal dan informasi. Ini bukan pengganti
                        diagnosis medis. Jika Anda butuh bantuan lebih lanjut, konsultasikan dengan profesional kesehatan
                        mental.
                    </p>
                </div>
            </div>

            <div
                class="bg-[#FEFBF5] rounded-2xl p-6 flex flex-col items-start gap-3 hover:shadow-md transition-shadow border border-orange-50/50">
                <div class="text-3xl bg-white p-2 rounded-lg shadow-sm">🔒</div>
                <div>
                    <h3 class="font-bold text-lg text-slate-900 mb-1">Privasi</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Data Anda bersifat anonim dan tidak disimpan. Digunakan hanya untuk menghitung hasil evaluasi secara
                        lokal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- BENEFITS SECTION --}}
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-[#E0F2FE]/60 rounded-3xl p-6 md:p-10 max-w-6xl mx-auto">
            <div class="text-center mb-8 md:mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-2">Manfaat MentalKU?</h2>
                <p class="text-slate-600 font-medium text-sm md:text-base">Empat manfaat utama dari tes MentalKU untuk
                    menjaga kesehatan mental Anda.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                @php
                    $benefits = [
                        [
                            'icon' => '❤️🩹',
                            'title' => 'Pahami Diri, Kenali Emosi',
                            'desc' =>
                                'Kenali depresi, cemas, stres awal Anda. Dapatkan wawasan diri dan mulai langkah preventif demi kesejahteraan mental yang lebih baik.',
                        ],
                        [
                            'icon' => '👆',
                            'title' => 'Akses Mudah & Cepat',
                            'desc' =>
                                'Skrining mental mudah, cepat, responsif. Akses Mentalku kapan pun, di mana pun dari laptop atau ponsel Anda. Bebas hambatan.',
                        ],
                        [
                            'icon' => '💡',
                            'title' => 'Inovasi Kesehatan Digital',
                            'desc' => 'Mendorong inovasi kesehatan dengan AI, untuk masyarakat yang lebih sehat',
                        ],
                        [
                            'icon' => '📈',
                            'title' => 'Progres Lebih Terpantau',
                            'desc' => 'Pantau perjalanan kesehatan mental Anda dengan Skrining berkala di Mentalku',
                        ],
                    ];
                @endphp

                @foreach ($benefits as $b)
                    {{-- Benefit Card: Flat design, clean borders, no massive shadow --}}
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center hover:-translate-y-1 transition-transform duration-300 h-full">
                        <div class="text-4xl mb-3 bg-slate-50 p-3 rounded-full">{{ $b['icon'] }}</div>
                        <h3 class="font-bold text-slate-900 text-lg mb-2">{{ $b['title'] }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">{{ $b['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="container mx-auto px-4 py-16 text-center">
        <div class="max-w-3xl mx-auto space-y-6">
            <div class="flex justify-center mb-2">
                <span class="text-4xl md:text-5xl animate-bounce">🔍</span>
            </div>

            <h2 class="text-2xl md:text-3xl font-bold text-slate-800">
                Skrining Awal <span class="text-[#0D9488]">Kesehatan Mental</span> berbasis <span
                    class="text-[#0D9488]">Machine Learning</span>
            </h2>

            <p class="text-slate-600 text-base md:text-lg max-w-2xl mx-auto">
                Dapatkan wawasan awal tentang kondisi mental Anda dengan skrining cerdas kami, kapan pun dan di mana pun.
            </p>

            <div class="pt-4 flex flex-col items-center gap-3">
                <button
                    class="btn bg-orange-400 hover:bg-orange-500 text-white border-none rounded-full px-10 h-12 text-base font-bold shadow-lg hover:shadow-orange-200/50 transition-all">
                    Mulai Tes MentalKU
                </button>
                <p class="text-xs text-slate-400 font-medium">Gratis | Rahasia Aman | Hasil Instan</p>
            </div>
        </div>
    </section>
@endsection
