<div id="loginModal" class="fixed inset-0 z-[9999] hidden">

    <div onclick="toggleLoginModal()" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity"></div>

    <div class="relative min-h-screen md:h-screen md:overflow-hidden flex items-center justify-center p-6">

        <div
            class="bg-[#FBF8F0] w-full max-w-4xl rounded-[30px] shadow-2xl overflow-hidden flex flex-col md:flex-row relative animate-fade-in-up">

            <button onclick="toggleLoginModal()"
                class="absolute top-4 right-4 z-50 btn btn-circle btn-sm btn-ghost text-slate-400 hover:text-slate-600">
                ✕
            </button>

            <div
                class="hidden md:flex md:w-1/2 bg-[#E0F2FE] flex-col items-center justify-center p-12 text-center relative">
                <div
                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                </div>

                <img src="{{ asset('assets/img/illustrations/ilustrasi_v3.png') }}"
                    class="w-72 drop-shadow-xl relative z-10">
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

                <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
                    @csrf

                    {{-- Menghapus session flash error lama, diganti dengan SweetAlert di bawah --}}

                    <div class="form-control w-full">
                        <label class="label mb-1">
                            <span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Email</span>
                        </label>
                        <label class="input input-bordered flex items-center gap-2 focus-within:outline-[#0D9488] w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                                <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                            </svg>
                            <input type="email" name="email" class="grow" placeholder="nama@gmail.com" required />
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label mb-1">
                            <span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Kata Sandi</span>
                        </label>
                        <label class="input input-bordered flex items-center gap-2 focus-within:outline-[#0D9488] w-full relative">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                            </svg>
                            <input type="password" name="password" id="login_password" class="grow pr-10" placeholder="••••••••" required />
                            <button type="button" onclick="togglePasswordVisibility('login_password', 'login_password_icon')" class="absolute right-3 text-slate-400 hover:text-slate-600 focus:outline-none">
                                <svg id="login_password_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </label>
                        <!-- <div class="text-right mt-1 w-full">
                            <a href="#" class="text-xs text-[#FF8966] hover:underline">Lupa Kata Sandi?</a>
                        </div> -->
                    </div>

                    <button type="submit" class="btn w-full bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full shadow-lg text-lg mt-4">
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

<script>
    if (typeof togglePasswordVisibility !== 'function') {
        window.togglePasswordVisibility = function(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />';
            }
        };
    }
</script>

{{-- SweetAlert Logic --}}
@if (session('is_login'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let errorHtml = "";
        
        @if($errors->any())
            errorHtml += "<ul class='text-left ml-4 list-disc text-sm text-red-500'>";
            @foreach($errors->all() as $error)
                errorHtml += "<li>{{ $error }}</li>";
            @endforeach
            errorHtml += "</ul>";
        @elseif(session('login_error'))
            errorHtml = "<p class='text-sm text-red-500 font-medium'>{{ session('login_error') }}</p>";
        @endif

        Swal.fire({
            icon: 'error',
            title: 'Masuk Gagal',
            html: errorHtml,
            background: '#FFFFFF',
            color: '#294C60',
            iconColor: '#F43F5E',
            customClass: {
                popup: 'rounded-[30px] shadow-xl border border-slate-100',
                title: 'text-2xl font-extrabold text-[#294C60] mb-2',
                htmlContainer: 'text-slate-500 font-medium',
                confirmButton: 'btn bg-[#0D9488] hover:bg-teal-700 text-white border-none rounded-full px-8'
            },
            buttonsStyling: false
        }).then(() => {
            // Membuka modal kembali agar user tidak kebingungan
            document.getElementById('loginModal').classList.remove('hidden');
        });
    });
</script>
@endif

@if (session('login_success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Masuk!',
            html: `
                <div class="text-center mt-1">
                    <p class="text-slate-600 text-[15px]">
                        Selamat datang kembali di <span class="font-bold text-[#FF8966]">MentalKU</span>!<br>
                        Senang melihatmu lagi, <br>
                        <strong class="text-2xl text-[#0D9488] block mt-2 capitalize">{{ session('login_success') }}</strong>
                    </p>
                    <div class="mt-4 mb-2 inline-block bg-teal-50 px-4 py-2 rounded-full border border-teal-100">
                        <span class="text-sm text-teal-700 font-medium">✨ Mari mulai perjalananmu hari ini! ✨</span>
                    </div>
                </div>
            `,
            showConfirmButton: false,
            timer: 3500,
            background: '#FFFFFF',
            color: '#294C60',
            iconColor: '#0D9488',
            customClass: {
                popup: 'rounded-[30px] shadow-xl border border-slate-100',
                title: 'text-2xl font-extrabold text-[#294C60] mb-2',
                htmlContainer: 'p-0'
            }
        });
    });
</script>
@endif

@if (session('logout_success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Keluar!',
            html: `
                <div class="text-center mt-1">
                    <p class="text-slate-600 text-[15px]">
                        Terima kasih telah mengunjungi <span class="font-bold text-[#FF8966]">MentalKU</span>!<br>
                        Sampai jumpa lagi, <br>
                        <strong class="text-2xl text-[#0D9488] block mt-2 capitalize">{{ session('logout_success') }}</strong>
                    </p>
                    <div class="mt-4 mb-2 inline-block bg-teal-50 px-4 py-2 rounded-full border border-teal-100">
                        <span class="text-sm text-teal-700 font-medium">✨ Jaga selalu kesehatan mentalmu! ✨</span>
                    </div>
                </div>
            `,
            showConfirmButton: false,
            timer: 3500,
            background: '#FFFFFF',
            color: '#294C60',
            iconColor: '#0D9488',
            customClass: {
                popup: 'rounded-[30px] shadow-xl border border-slate-100',
                title: 'text-2xl font-extrabold text-[#294C60] mb-2',
                htmlContainer: 'p-0'
            }
        });
    });
</script>
@endif