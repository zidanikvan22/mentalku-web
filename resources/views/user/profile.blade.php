@extends('layout.mainUser')

@section('title', 'Profil Saya - MentalKU')

@section('content')
    <div class="pt-24 lg:pt-32"></div>

    <section class="container mx-auto px-4 md:px-10 mb-20">

        {{-- Flash Message Success (SweetAlert) --}}
        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mantap!',
                        text: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 2500,
                        background: '#FFFFFF',
                        color: '#294C60',
                        iconColor: '#0D9488',
                        customClass: {
                            popup: 'rounded-[30px] shadow-xl border border-slate-100',
                            title: 'text-2xl font-extrabold text-[#294C60] mb-2',
                            htmlContainer: 'text-slate-500 font-medium'
                        }
                    });
                });
            </script>
        @endif

        <div class="max-w-5xl mx-auto bg-[#E0F2FE] rounded-[40px] shadow-xl overflow-hidden mb-16 animate-fade-in-up">

            <div
                class="bg-white/50 backdrop-blur-sm p-6 md:p-12 flex flex-col md:flex-row items-center gap-6 border-b border-white/50">
                <div class="w-24 h-24 md:w-40 md:h-40 rounded-full bg-white p-2 shadow-lg relative group">
                    {{-- LOGIC GAMBAR PROFIL --}}
                    @php
                        $photoUrl = Auth::user()->profile_photo_path
                            ? asset('storage/' . Auth::user()->profile_photo_path)
                            : 'https://ui-avatars.com/api/?name=' .
                                urlencode(Auth::user()->name) .
                                '&background=294C60&color=fff&size=256';
                    @endphp
                    <img src="{{ $photoUrl }}" alt="Avatar"
                        class="w-full h-full rounded-full object-cover border-4 border-[#E0F2FE]">
                </div>

                <div class="text-center md:text-left flex-grow">
                    <h1 class="text-2xl md:text-4xl font-extrabold text-[#294C60] mb-1">{{ Auth::user()->name }}</h1>
                    <p class="text-slate-500 text-base font-medium mb-4">{{ '@' . Auth::user()->username }}</p>

                    <!-- MADE CHANGE: force horizontal alignment on mobile, allow wrap -->
                    <div class="flex flex-row flex-wrap gap-3 justify-center md:justify-start">

                        <a href="{{ route('profile.edit') }}"
                            class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-4 md:px-8 py-2 shadow-lg hover:shadow-orange-200/50 normal-case min-w-[110px] md:min-w-[140px]">
                            Edit Profil
                        </a>

                        <form action="{{ route('logout') }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit"
                                class="btn btn-outline border-rose-500 text-rose-500 hover:bg-rose-50 hover:border-rose-600 hover:text-rose-600 rounded-full px-4 md:px-8 py-2 normal-case min-w-[110px] md:min-w-[140px] flex items-center gap-2 group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Keluar
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="p-6 md:p-12">
                <!-- MADE CHANGE: smaller gaps on mobile -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-y-8 gap-x-6 md:gap-x-12">

                    <div class="space-y-5">
                        <h3 class="text-xl font-bold text-[#294C60] border-b border-slate-300/50 pb-2 mb-3">Informasi Dasar
                        </h3>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#0D9488] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Nama Lengkap</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">{{ Auth::user()->name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#0D9488] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Nama Panggilan</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">{{ Auth::user()->username }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#0D9488] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Email</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#0D9488] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Tanggal Lahir</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">
                                    {{ \Carbon\Carbon::parse(Auth::user()->birth_date)->translatedFormat('d F Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#0D9488] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Nomor HP / WA</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">
                                    {{ Auth::user()->phone ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <h3 class="text-xl font-bold text-[#294C60] border-b border-slate-300/50 pb-2 mb-3">Informasi
                            Tambahan</h3>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#FF8966] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Pekerjaan</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">
                                    {{ Auth::user()->job ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#FF8966] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Kota/Kabupaten</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">
                                    {{ Auth::user()->city ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#FF8966] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Pendidikan Terakhir
                                </p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">
                                    {{ Auth::user()->education ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#FF8966] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Status Perkawinan</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">
                                    {{ Auth::user()->marital_status ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center text-[#FF8966] shadow-sm shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold tracking-wider">Kondisi Tinggal</p>
                                <p class="text-base md:text-lg font-semibold text-[#294C60]">
                                    {{ Auth::user()->living_condition ?? '-' }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-300/50 text-center md:text-left">
                    <p class="text-sm text-slate-500">
                        * Informasi Anda tetap <span class="font-bold text-[#294C60]">pribadi dan aman</span>. Untuk
                        rincian
                        lebih lanjut, silakan baca <a href="#" class="text-[#0D9488] hover:underline">kebijakan
                            privasi</a> kami.
                    </p>
                </div>
            </div>
        </div>


        <div class="max-w-5xl mx-auto animate-fade-in-up delay-100">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#294C60]">Riwayat Aktivitas</h2>

                {{-- Form Filter & Sort (Auto Submit pas diubah) --}}
                <form method="GET" action="{{ route('profile.index') }}"
                    class="flex flex-col sm:flex-row gap-3 w-full md:w-auto" id="filterForm">

                    {{-- Dropdown Filter Level --}}
                    <select name="level"
                        class="select border-slate-300 rounded-full focus:outline-[#0D9488] w-full sm:w-auto text-sm text-slate-600 bg-white"
                        onchange="document.getElementById('filterForm').submit();">
                        <option value="Semua" {{ request('level') == 'Semua' ? 'selected' : '' }}>Semua Kondisi</option>
                        <option value="Normal" {{ request('level') == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Ringan" {{ request('level') == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                        <option value="Sedang" {{ request('level') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="Berat" {{ request('level') == 'Berat' ? 'selected' : '' }}>Berat</option>
                        <option value="Sangat Berat" {{ request('level') == 'Sangat Berat' ? 'selected' : '' }}>Sangat
                            Berat</option>
                    </select>

                    {{-- Dropdown Urutkan Waktu --}}
                    <select name="sort"
                        class="select border-slate-300 rounded-full focus:outline-[#0D9488] w-full sm:w-auto text-sm text-slate-600 bg-white"
                        onchange="document.getElementById('filterForm').submit();">
                        <option value="desc" {{ request('sort', 'desc') == 'desc' ? 'selected' : '' }}>Terbaru ke
                            Terlama</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terlama ke Terbaru
                        </option>
                    </select>

                </form>
            </div>

            <div class="space-y-4">
                @forelse($histories as $history)
                    @php
                        // Logic Warna Dinamis
                        $level = $history->final_level ?? 'Normal';
                        $colors = [
                            'Normal' => [
                                'bg' => 'bg-teal-100',
                                'text' => 'text-[#0D9488]',
                                'border' => 'border-[#0D9488]',
                            ],
                            'Ringan' => [
                                'bg' => 'bg-blue-100',
                                'text' => 'text-blue-500',
                                'border' => 'border-blue-500',
                            ],
                            'Sedang' => [
                                'bg' => 'bg-amber-100',
                                'text' => 'text-[#F59E0B]',
                                'border' => 'border-[#F59E0B]',
                            ],
                            'Berat' => [
                                'bg' => 'bg-orange-100',
                                'text' => 'text-orange-500',
                                'border' => 'border-orange-500',
                            ],
                            'Sangat Berat' => [
                                'bg' => 'bg-rose-100',
                                'text' => 'text-[#F43F5E]',
                                'border' => 'border-[#F43F5E]',
                            ],
                            'Sangat berat' => [
                                'bg' => 'bg-rose-100',
                                'text' => 'text-[#F43F5E]',
                                'border' => 'border-[#F43F5E]',
                            ], // Fallback case sensitivity
                        ];
                        $style = $colors[$level] ?? [
                            'bg' => 'bg-slate-100',
                            'text' => 'text-slate-500',
                            'border' => 'border-slate-500',
                        ];

                        // Logic Nomor Tes Akurat (Biar gak ngaco pas di-filter/sort)
                        $testNumber = \App\Models\EvaluationResult::where('user_id', Auth::id())
                            ->where('created_at', '<=', $history->created_at)
                            ->count();
                    @endphp

                    <div
                        class="bg-white rounded-2xl p-4 md:p-6 shadow-md border-l-8 {{ $style['border'] }} hover:shadow-lg transition-all flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <h3 class="text-lg font-bold text-[#294C60]">Evaluasi Diri {{ $testNumber }}</h3>
                                <span
                                    class="{{ $style['bg'] }} {{ $style['text'] }} text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $level }}
                                </span>
                            </div>
                            <p class="text-sm text-slate-400 mb-2">
                                {{ $history->created_at->translatedFormat('d F Y, H:i') }}</p>
                            <p class="text-sm font-medium text-slate-600">
                                Skor: Depresi ({{ $history->depression_score }}), Kecemasan
                                ({{ $history->anxiety_score }}), Stres ({{ $history->stress_score }})
                            </p>
                        </div>

                        {{-- Button Mata / Detail --}}
                        <a href="{{ route('evaluation.history', $history->id) }}"
                            class="btn btn-circle btn-ghost text-slate-400 hover:bg-slate-100 hover:text-[#0D9488]"
                            title="Lihat Detail">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                @empty
                    <div class="text-center py-10 bg-white rounded-2xl border border-dashed border-slate-300">
                        <p class="text-slate-500 font-medium">Belum ada riwayat aktivitas yang sesuai filter.</p>
                    </div>
                @endforelse
            </div>

            <div class="flex justify-center mt-10">
                {{ $histories->links() }}
            </div>

        </div>



    </section>
@endsection
