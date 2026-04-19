<div id="registerModal" class="fixed inset-0 z-[9999] hidden">

    <div onclick="toggleRegisterModal()" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity">
    </div>

    <div class="relative min-h-screen md:h-screen md:overflow-hidden flex items-center justify-center p-2 md:p-4">

        <div
            class="bg-white w-full max-w-5xl rounded-[30px] shadow-2xl overflow-hidden flex flex-col-reverse md:flex-row relative animate-fade-in-up max-h-[90vh]">

            <button onclick="toggleRegisterModal()"
                class="absolute top-4 right-4 z-50 btn btn-circle btn-sm btn-ghost text-slate-400 hover:text-slate-600 block md:hidden">✕</button>

            <div class="bg-[#FBF8F0] w-full md:w-3/5 p-6 md:p-10 overflow-y-auto">
                <div class="text-center md:text-left mb-6">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-[#294C60]">Buat Akun Baru</h2>
                    <p class="text-slate-400 text-sm">Mulai perjalanan kesehatan mentalmu hari ini.</p>
                </div>

                <form action="{{ route('register.process') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    <div class="form-control md:col-span-2">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Nama Lengkap</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="xxxxxxxxxxxxxxx" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Nama Panggilan</span></label>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="xxxxxxxx" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Jenis Kelamin</span></label>
                        <select name="gender" class="select select-bordered w-full focus:outline-[#0D9488]" required>
                            <option disabled selected>Pilih...</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-control md:col-span-2">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Tanggal Lahir</span></label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control md:col-span-2">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Email</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@gmail.com" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Kata Sandi</span></label>
                        <div class="relative">
                            <input type="password" name="password" id="register_password" placeholder="••••••••" class="input input-bordered w-full focus:outline-[#0D9488] pr-10" required />
                            <button type="button" onclick="togglePasswordVisibility('register_password', 'register_password_icon')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none">
                                <svg id="register_password_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60] text-xs md:text-sm">Konfirmasi Kata Sandi</span></label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="register_password_confirmation" placeholder="••••••••" class="input input-bordered w-full focus:outline-[#0D9488] pr-10" required />
                            <button type="button" onclick="togglePasswordVisibility('register_password_confirmation', 'register_password_confirmation_icon')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none">
                                <svg id="register_password_confirmation_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <button type="submit" class="btn w-full bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full shadow-lg text-lg">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>

                <p class="text-center text-sm text-slate-500 mt-4">
                    Sudah punya akun?
                    <a href="javascript:void(0)" onclick="switchToLogin()"
                        class="text-[#0D9488] font-bold hover:underline">Masuk</a>
                </p>
            </div>

            <div
                class="hidden md:flex md:w-2/5 bg-[#E0F2FE] flex-col items-center justify-center p-10 text-center relative">
                <button onclick="toggleRegisterModal()"
                    class="absolute top-4 right-4 z-50 btn btn-circle btn-sm btn-ghost text-slate-500 hover:text-slate-700">✕</button>
                <div
                    class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                </div>

                <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}"
                    class="w-6/7 max-w-sm drop-shadow-xl relative z-10">
                <h3 class="text-2xl font-bold text-[#294C60] relative z-10 -mt-16">Bergabunglah Bersama Kami!</h3>
                <p class="text-slate-600 mt-2 relative z-10">Langkah pertama menuju pikiran yang lebih tenang.</p>
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
@if (session('is_register') && $errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let errorMessages = @json($errors->all());
        let htmlErrors = "<ul class='text-left ml-4 list-disc text-sm text-red-500'>";
        errorMessages.forEach(msg => {
            htmlErrors += "<li>" + msg + "</li>";
        });
        htmlErrors += "</ul>";

        Swal.fire({
            icon: 'error',
            title: 'Pendaftaran Gagal',
            html: htmlErrors,
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
            document.getElementById('registerModal').classList.remove('hidden');
        });
    });
</script>
@endif

@if (session('register_success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('register_success') }}",
            background: '#FFFFFF',
            color: '#294C60',
            iconColor: '#0D9488',
            customClass: {
                popup: 'rounded-[30px] shadow-xl border border-slate-100',
                title: 'text-2xl font-extrabold text-[#294C60] mb-2',
                htmlContainer: 'text-slate-500 font-medium',
                confirmButton: 'btn bg-[#0D9488] hover:bg-teal-700 text-white border-none rounded-full px-8'
            },
            buttonsStyling: false
        }).then(() => {
            // Langsung membuka modal login agar user bisa langsung mendaftar
            document.getElementById('loginModal').classList.remove('hidden');
        });
    });
</script>
@endif