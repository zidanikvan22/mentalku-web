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

    {{-- FILTER BUTTONS --}}
    <div class="flex flex-wrap justify-center gap-3 mb-12 animate-fade-in-up delay-100 overflow-x-auto pb-4 md:pb-0 px-4 md:px-0">
        @php
        $categories = ['Semua', 'Depresi', 'Stres', 'Kecemasan', 'Rawat Diri'];
        @endphp

        @foreach($categories as $cat)
        <a href="{{ route('education.index', ['category' => $cat]) }}"
            class="btn rounded-full px-8 normal-case text-base font-medium transition-all
                   {{ $currentCategory == $cat 
                        ? 'bg-[#0D9488] hover:bg-teal-700 text-white border-none shadow-md shadow-teal-100' 
                        : 'bg-white hover:bg-[#E0F2FE] hover:border-[#0D9488] hover:text-[#0D9488] text-slate-500 border border-slate-200' 
                   }}">
            {{ $cat }}
        </a>
        @endforeach
    </div>

    {{-- GRID CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 animate-fade-in-up delay-200">

        @forelse ($educations as $item)
        {{-- Card Item --}}
        <a href="{{ $item->external_url }}" target="_blank"
            class="group bg-white rounded-[24px] overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl hover:border-[#9BCDE6] transition-all duration-300 flex flex-col h-full">

            {{-- Image --}}
            <div class="h-48 bg-[#F0F9FF] relative overflow-hidden group">
                {{-- Handle Image: Cek kalau path-nya url http atau local asset --}}
                @php
                $imgSrc = Str::startsWith($item->image_path, 'http') 
                    ? $item->image_path 
                    : asset('assets/img/education/' . $item->image_path);
                @endphp
                <img src="{{ $imgSrc }}" alt="{{ $item->title }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-[#0D9488] shadow-sm z-10">
                    {{ $item->category }}
                </div>
            </div>

            {{-- Content --}}
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-slate-400 mb-3 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="shrink-0">{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->locale('id')->translatedFormat('d F Y') : '-' }}</span>
                    <span class="shrink-0">•</span>
                    <span class="truncate">{{ $item->author }}</span>
                </div>

                <h3 class="text-lg font-bold text-[#294C60] mb-3 leading-snug group-hover:text-[#FF8966] transition-colors line-clamp-2">
                    {{ $item->title }}
                </h3>

                <p class="text-slate-500 text-sm mb-4 line-clamp-3 leading-relaxed flex-grow">
                    {{ $item->excerpt }}
                </p>

                <div class="mt-auto flex items-center text-[#FF8966] text-sm font-bold group-hover:translate-x-2 transition-transform">
                    Baca Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </a>
        @empty
        {{-- Tampilan kalau tidak ada data --}}
        <div class="col-span-full text-center py-20">
            <div class="text-6xl mb-4">📂</div>
            <h3 class="text-xl font-bold text-[#294C60]">Belum ada artikel di kategori ini.</h3>
            <p class="text-slate-400">Coba pilih kategori lain ya!</p>
        </div>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="flex justify-center mt-16 animate-fade-in-up delay-300">
        {{-- Menggunakan Default Pagination Laravel + Styling Tailwind --}}
        {{-- Kalau mau styling tombolnya persis kayak design lo, kita harus publish vendor pagination. 
                 Tapi buat sekarang, default Tailwind pagination Laravel udah cukup rapi kok. --}}

        {{ $educations->links() }}
    </div>

</section>
@endsection