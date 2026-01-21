@extends('layout.mainUser')

@section('title', 'Dashboard - MentalKU')

@section('content')
    <div class="pt-20 lg:pt-20"></div>

    <section class="container mx-auto px-4 md:px-16 mb-12 bg-amber-50">
        <div
            class="w-full max-w-[1400px] mx-auto mt-8 shadow-2xl rounded-[30px] md:rounded-[60px] overflow-hidden bg-[#E0F2FE]">

            <div class="grid grid-cols-1 lg:grid-cols-5">

                <div
                    class="lg:col-span-3 px-6 py-10 md:px-16 md:pt-10 flex flex-col justify-start text-left order-2 lg:order-1 relative z-10">

                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4 md:mb-6 tracking-tight">
                        <span class="text-[#294C60] block">Temukan Ketenangan.</span>
                        <span
                            class="bg-gradient-to-r from-[#294C60] to-[#0D9488] bg-clip-text text-transparent block mt-1 md:mt-2">
                            Pahami Diri Anda.
                        </span>
                    </h1>

                    <h2 class="text-xl md:text-3xl font-bold text-[#FF8966] mb-4 md:mb-6 leading-snug">
                        Mulai Perjalanan Anda dengan Tes MentalKU.
                    </h2>

                    <p class="text-slate-600 font-normal text-base md:text-lg leading-relaxed max-w-2xl mb-8 md:mb-10">
                        Skrining awal yang cepat dan aman hadir untuk Anda. Jawab 21 pertanyaan singkat, dapatkan wawasan
                        akurat mengenai tingkat stres, kecemasan, dan depresi, serta temukan panduan awal untuk
                        kesejahteraan diri Anda.
                    </p>

                    <div class="flex items-start">
                        <button
                            class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-8 md:px-10 py-3 md:py-4 h-auto text-base md:text-lg shadow-lg hover:shadow-orange-200/50 transition-all transform hover:-translate-y-1 w-full md:w-auto">
                            Mulai Tes MentalKU
                        </button>
                    </div>
                </div>

                <div
                    class="lg:col-span-2 bg-[#CFE8F3] relative flex items-center justify-center order-1 lg:order-2 border-l-0 lg:border-l-4 border-white/40 pt-8 pb-8 md:pt-10 px-8 min-h-[300px] lg:min-h-auto">

                    <div
                        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                    </div>

                    <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}" alt="Mental Health Illustration"
                        class="w-full max-w-[280px] md:max-w-lg object-contain drop-shadow-2xl relative z-20 animate-fade-in-up">
                </div>

            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-16 py-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-4xl font-bold text-black">
                Apa yang Perlu Anda Ketahui Sebelum Tes?
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-[#FEFBF5] rounded-3xl p-8 flex flex-col items-start gap-4 hover:shadow-md transition-shadow">
                <div class="text-4xl">🧐</div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Fokus Skrining MentalKU?</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Tes MentalKU berfokus pada Depresi, Kecemasan, dan Stres melalui kuesioner DASS-21.
                    </p>
                </div>
            </div>

            <div class="bg-[#FEFBF5] rounded-3xl p-8 flex flex-col items-start gap-4 hover:shadow-md transition-shadow">
                <div class="text-4xl">📢</div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Bukan Diagnosis Medis</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Hasil ini hanya skrining awal. Bukan pengganti diagnosis medis. Hubungi profesional jika butuh
                        bantuan lanjut.
                    </p>
                </div>
            </div>

            <div class="bg-[#FEFBF5] rounded-3xl p-8 flex flex-col items-start gap-4 hover:shadow-md transition-shadow">
                <div class="text-4xl">🔒</div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Privasi</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Data Anda bersifat anonim dan tidak disimpan. Kalkulasi dilakukan secara lokal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-16 py-12">
        <div class="bg-[#D8EEF1] rounded-[40px] p-8 md:p-16">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-4xl font-bold text-black mb-3">Manfaat MentalKU?</h2>
                <p class="text-gray-600 font-medium">Empat manfaat utama dari tes MentalKU untuk menjaga kesehatan mental
                    Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                @php
                    $benefits = [
                        [
                            'icon' => '❤️🩹',
                            'title' => 'Pahami Diri, Kenali Emosi',
                            'desc' => 'Kenali depresi, cemas, stres awal Anda. Dapatkan wawasan diri.',
                        ],
                        [
                            'icon' => '👆',
                            'title' => 'Akses Mudah, Skrining Cepat',
                            'desc' => 'Skrining mental mudah, cepat, responsif di mana pun.',
                        ],
                        [
                            'icon' => '💡',
                            'title' => 'Mendorong Inovasi Kesehatan',
                            'desc' => 'Mendorong inovasi kesehatan dengan AI untuk masyarakat.',
                        ],
                        [
                            'icon' => '📈',
                            'title' => 'Progres Diri, Lebih Terpantau',
                            'desc' => 'Pantau perjalanan kesehatan mental Anda dengan skrining berkala.',
                        ],
                    ];
                @endphp

                @foreach ($benefits as $b)
                    <div
                        class="bg-white p-8 rounded-[30px] shadow-sm flex flex-col items-center text-center hover:-translate-y-1 transition-transform duration-300 h-full justify-center">
                        <div class="text-5xl mb-4">{{ $b['icon'] }}</div>
                        <h3 class="font-bold text-gray-900 text-xl mb-3">{{ $b['title'] }}</h3>
                        <p class="text-sm text-gray-500 leading-relaxed px-4">{{ $b['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-16 py-12 md:py-20 text-center">
        <div class="max-w-4xl mx-auto space-y-6">
            <div class="flex justify-center mb-4">
                <span class="text-5xl text-teal-400">🔍</span>
            </div>

            <h2 class="text-2xl md:text-4xl font-bold text-black">
                Skrining Awal <span class="text-green-600">Kesehatan Mental</span> berbasis <span
                    class="text-green-600">Machine Learning</span>
            </h2>

            <p class="text-gray-600 text-lg">
                Dapatkan wawasan awal tentang kondisi mental Anda dengan<br class="hidden md:block">
                skrining cerdas kami, kapan pun dan di mana pun.
            </p>

            <div class="pt-6 flex flex-col items-center gap-3">
                <button
                    class="btn btn-warning bg-orange-400 hover:bg-orange-500 text-white border-none rounded-full px-12 py-3 text-lg font-bold shadow-lg">
                    Mulai Tes MentalKU
                </button>
                <p class="text-xs text-gray-400 font-medium">Gratis | Rahasia Aman | Hasil Instan</p>
            </div>
        </div>
    </section>
@endsection
