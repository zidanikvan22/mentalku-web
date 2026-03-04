<div class="navbar bg-[#FBF8F0] backdrop-blur-sm fixed top-0 w-full z-40 border-b border-gray-100 px-4 h-16">

    <div class="flex-none lg:hidden">
        <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-6 h-6 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </label>
    </div>

    <div class="flex-1 lg:hidden text-center">
        <span class="text-lg font-bold text-[#294C60]">MentalKU?</span>
    </div>

    <div class="flex-none lg:hidden">
        <img src="{{ asset('assets\img\logo\logo_mentalku1.png') }}" alt="Logo" class="h-8 w-auto">
    </div>

    <div class="hidden lg:flex flex-1 justify-between items-center px-12">
        <a class="flex items-center gap-2">
            <img src="{{ asset('assets\img\logo\logo_mentalku1.png') }}" alt="Logo" class="h-10">
            <span class="text-xl font-bold text-[#294C60]">MentalKU?</span>
        </a>

        <ul class="menu menu-horizontal px-1 font-medium text-[#294C60] gap-6">
            @auth
            {{-- STATE LOGIN: Pindah ke Halaman Asli --}}
            <li>
                <a href="{{ route('dashboard') }}" class="rounded-lg hover:bg-[#D8EEF1] active:bg-[#D8EEF1]">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ url('/self-evaluation-cover') }}" class="rounded-lg hover:bg-[#D8EEF1] active:bg-[#D8EEF1]">
                    Evaluasi Diri
                </a>
            </li>
            <li>
                <a href="{{ url('/education') }}" class="rounded-lg hover:bg-[#D8EEF1] active:bg-[#D8EEF1]">
                    Edukasi
                </a>
            </li>
            @else
            {{-- STATE GUEST: Trigger Modal Login --}}
            <li>
                <button onclick="toggleLoginModal()" class="rounded-lg hover:bg-[#D8EEF1] active:bg-[#D8EEF1]">
                    Beranda
                </button>
            </li>
            <li>
                <button onclick="toggleLoginModal()" class="rounded-lg hover:bg-[#D8EEF1] active:bg-[#D8EEF1]">
                    Evaluasi Diri
                </button>
            </li>
            <li>
                <button onclick="toggleLoginModal()" class="rounded-lg hover:bg-[#D8EEF1] active:bg-[#D8EEF1]">
                    Edukasi
                </button>
            </li>
            @endauth

        </ul>

        <div class="flex gap-3">
            @guest
            <button onclick="toggleLoginModal()"
                class="btn btn-outline btn-sm px-6 rounded-full hover:bg-[#294C60] hover:text-white transition-colors">
                Masuk
            </button>

            <button onclick="toggleRegisterModal()"
                class="btn btn-primary bg-[#294C60] hover:bg-[#FBF8F0] text-white hover:text-black btn-sm px-6 rounded-full border-none">
                Daftar
            </button>
            @endguest
            @auth
            {{-- Bungkus pake A tag ke route profile --}}
            <a href="{{ route('profile.index') }}" class="flex items-center gap-3 bg-[#E0F2FE] py-1 pl-4 pr-2 rounded-full border border-slate-200 hover:bg-[#D0EBFD] transition-colors cursor-pointer">
                <span class="font-bold text-[#294C60] text-sm truncate max-w-[150px]">
                    {{ Auth::user()->name }}
                </span>
                <div class="h-8 w-8 rounded-full bg-[#294C60] flex items-center justify-center overflow-hidden border border-white">
                    {{-- Logic Gambar Navbar --}}
                    @if(Auth::user()->profile_photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="w-full h-full object-cover">
                    @else
                    <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    @endif
                </div>
            </a>
            @endauth
        </div>
    </div>
</div>