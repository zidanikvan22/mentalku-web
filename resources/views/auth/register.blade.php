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
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60]">Nama Lengkap</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60]">Username</span></label>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="johndoe123" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60]">Jenis Kelamin</span></label>
                        <select name="gender" class="select select-bordered w-full focus:outline-[#0D9488]" required>
                            <option disabled selected>Pilih...</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-control md:col-span-2">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60]">Tanggal Lahir</span></label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control md:col-span-2">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60]">Email</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="email@contoh.com" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60]">Kata Sandi</span></label>
                        <input type="password" name="password" placeholder="••••••••" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="form-control">
                        <label class="label py-1"><span class="label-text font-semibold text-[#294C60]">Konfirmasi Sandi</span></label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" class="input input-bordered w-full focus:outline-[#0D9488]" required />
                    </div>

                    <div class="md:col-span-2 mt-4">
                        @if ($errors->any())
                        <div class="alert alert-error mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li class="text-white text-xs">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

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
                    class="w-4/5 max-w-sm mb-6 drop-shadow-xl relative z-10">
                <h3 class="text-2xl font-bold text-[#294C60] relative z-10">Bergabunglah Bersama Kami!</h3>
                <p class="text-slate-600 mt-2 relative z-10">Langkah pertama menuju pikiran yang lebih tenang.</p>
            </div>

        </div>
    </div>
</div>