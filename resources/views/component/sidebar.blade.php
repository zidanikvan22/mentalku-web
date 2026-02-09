<div class="menu p-6 w-80 min-h-full bg-[#FBF8F0] text-gray-800 flex flex-col">

    <div class="flex items-center justify-between mb-6 pb-4 border-b border-green-300/50">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/img/logo/logo_mentalku1.png') }}" alt="Sehati" class="h-10 w-10 object-contain">
            <span class="text-xl font-bold tracking-wide text-black">MentalKU?</span>
        </div>
        <label for="my-drawer-3" aria-label="close sidebar"
            class="btn btn-sm btn-circle btn-ghost text-gray-600 hover:bg-white/50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </label>
    </div>

    <ul class="space-y-3 font-medium">
        <li>
            <a href="#"
                class="flex items-center gap-4 py-3 px-4 bg-white text-[#95cef5] rounded-xl shadow-sm hover:bg-white transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Beranda
            </a>
        </li>

        <li>
            <a href="#" class="flex items-center gap-4 py-3 px-4 hover:bg-white/50 rounded-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Evaluasi Diri
            </a>
        </li>

        <li>
            <a href="#" class="flex items-center gap-4 py-3 px-4 hover:bg-white/50 rounded-xl transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Berita
            </a>
        </li>

        <div class="h-px bg-green-400/30 my-2"></div>
        @guest
            <li>
                <a href="javascript:void(0)" onclick="toggleLoginModal(); closeSidebar()"
                    class="flex items-center gap-4 py-3 px-4 hover:bg-white/50 rounded-xl transition-all cursor-pointer text-[#294C60] hover:text-[#FF8966]">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="font-bold">Masuk</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0)" onclick="toggleRegisterModal(); closeSidebar()"
                    class="flex items-center gap-4 py-3 px-4 hover:bg-white/50 rounded-xl transition-all cursor-pointer text-[#294C60] hover:text-[#FF8966]">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    <span class="font-bold">Daftar</span>
                </a>
            </li>
        @endguest
        @auth
            <li>
                <a href="{{ url('/profile') }}" onclick="closeSidebar()"
                    class="flex w-full items-center gap-4 py-3 px-4 hover:bg-white/50 rounded-xl transition-all cursor-pointer text-[#294C60] hover:text-[#FF8966]">
                    {{-- Icon User --}}
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-bold">Profil Saya</span>
                </a>
            </li>

            <li>
                {{-- 1. Tombol Visual (Pake <a> biar sejajar sama menu lain) --}}
                <a href="javascript:void(0)"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit(); closeSidebar();"
                    class="flex items-center gap-4 py-3 px-4 hover:bg-red-50 rounded-xl transition-all cursor-pointer text-red-500 hover:text-red-600">

                    {{-- Icon Logout --}}
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-bold">Keluar</span>
                </a>

                {{-- 2. Form Tersembunyi (Invisible Worker) --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        @endauth
    </ul>
</div>
