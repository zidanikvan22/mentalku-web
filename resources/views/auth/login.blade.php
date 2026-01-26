<div id="loginModal" class="fixed inset-0 z-[9999] hidden">

    <div onclick="toggleLoginModal()" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity"></div>

    <div class="relative min-h-screen md:min-h-0 flex items-center justify-center p-6">

        <div
            class="bg-white w-full max-w-4xl rounded-[30px] shadow-2xl overflow-hidden flex flex-col md:flex-row relative animate-fade-in-up">

            <button onclick="toggleLoginModal()"
                class="absolute top-4 right-4 z-50 btn btn-circle btn-sm btn-ghost text-slate-400 hover:text-slate-600">
                ✕
            </button>

            <div
                class="hidden md:flex md:w-1/2 bg-[#E0F2FE] flex-col items-center justify-center p-12 text-center relative">
                <div
                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                </div>

                <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}"
                    class="w-64 mb-6 drop-shadow-xl relative z-10">
                <h3 class="text-2xl font-bold text-[#294C60] relative z-10">Hai, kamu tidak sendiri!</h3>
                <p class="text-slate-600 mt-2 relative z-10">Bergabunglah dengan MentalKU dan temukan dukungan untuk
                    jiwamu.</p>
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12">
                <div class="text-center md:text-left mb-8">
                    <div class="flex justify-center md:justify-start items-center gap-2 mb-2">
                        <img src="{{ asset('assets/img/logo/logo_mentalku1.png') }}" class="h-8"> <span
                            class="font-bold text-xl text-[#294C60]">MentalKU?</span>
                    </div>
                    <h2 class="text-2xl md:text-4xl font-extrabold text-[#294C60]">Welcome Back!</h2>
                    <p class="text-slate-400 text-xs md:text-sm">Masuk untuk melanjutkan perjalananmu.</p>
                </div>

                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="form-control ">
                        <label class="label mb-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Email /
                                Username</span></label>
                        <label class="input input-bordered flex items-center gap-2 focus-within:outline-[#0D9488]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input type="text" class="grow" placeholder="nama@email.com" />
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label mb-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Kata
                                Sandi</span></label>
                        <label class="input input-bordered flex items-center gap-2 focus-within:outline-[#0D9488]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input type="password" class="grow" placeholder="••••••••" />
                        </label>
                        <div class="text-right mt-1">
                            <a href="#" class="text-xs text-[#FF8966] hover:underline">Lupa Kata Sandi?</a>
                        </div>
                    </div>

                    <button
                        class="btn w-full bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full shadow-lg text-lg mt-4">
                        Masuk 
                    </button>
                </form>

                <p class="text-center text-sm text-slate-500 mt-2">
                    Belum memiliki akun?
                    <a href="javascript:void(0)" onclick="switchToRegister()"
                        class="text-[#0D9488] font-bold hover:underline">Daftar</a>
                </p>
            </div>
        </div>
    </div>
</div>
