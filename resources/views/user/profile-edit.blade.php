@extends('layout.mainUser')

@section('title', 'Edit Profil - MentalKU')

@section('content')
    <div class="pt-24 lg:pt-32"></div>

    <section class="container mx-auto px-4 md:px-10 mb-20">

        <div class="max-w-4xl mx-auto mb-8 flex items-center gap-4">
            <a href="/profile" class="btn btn-circle btn-ghost text-slate-500 hover:bg-slate-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-3xl font-extrabold text-[#294C60]">Edit Profil</h1>
        </div>

        <div
            class="max-w-4xl mx-auto bg-white rounded-[40px] shadow-xl overflow-hidden border border-slate-100 animate-fade-in-up">

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="bg-[#E0F2FE] p-10 flex flex-col md:flex-row items-center gap-8 border-b border-slate-200">

                    <div class="relative group">
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-white">
                            <img id="avatarPreview"
                                src="https://ui-avatars.com/api/?name=Zidan+Muhammad&background=294C60&color=fff&size=256"
                                alt="Avatar Preview" class="w-full h-full object-cover">
                        </div>
                        <div
                            class="absolute inset-0 bg-black/30 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 text-center md:text-left">
                        <h3 class="text-xl font-bold text-[#294C60]">Foto Profil</h3>
                        <p class="text-sm text-slate-500 mb-2">Format: JPG, PNG (Max. 2MB)</p>

                        <div class="flex flex-wrap justify-center md:justify-start gap-3">
                            <label
                                class="btn bg-[#294C60] hover:bg-[#1f3a4a] text-white border-none rounded-full px-6 normal-case cursor-pointer shadow-md">
                                Ganti Gambar
                                <input type="file" class="hidden" onchange="previewImage(this)">
                            </label>

                            <button type="button"
                                class="btn btn-outline border-rose-400 text-rose-500 hover:bg-rose-50 hover:border-rose-500 hover:text-rose-600 rounded-full px-6 normal-case">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-12 space-y-10">

                    <div>
                        <h3
                            class="flex items-center gap-2 text-xl font-bold text-[#294C60] border-b border-slate-200 pb-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#0D9488]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Informasi Dasar
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Nama Lengkap</label>
                                <input type="text" value="Zidan Muhammad Ikvan"
                                    class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]" />
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Username</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold">@</span>
                                    <input type="text" value="iyobaiyo"
                                        class="input input-bordered w-full rounded-xl pl-10 focus:outline-[#0D9488] focus:border-[#0D9488]" />
                                </div>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Jenis Kelamin</label>
                                <select
                                    class="select select-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Tanggal Lahir</label>
                                <input type="date" value="2004-07-20"
                                    class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]" />
                            </div>

                            <div class="form-control md:col-span-2">
                                <label class="label font-semibold text-slate-600">Email</label>
                                <input type="email" value="zidan@gmail.com"
                                    class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]" />
                            </div>

                            <div class="form-control md:col-span-2">
                                <label class="label font-semibold text-slate-600">Nomor HP / WhatsApp</label>
                                <input type="tel" value="081234561234"
                                    class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3
                            class="flex items-center gap-2 text-xl font-bold text-[#294C60] border-b border-slate-200 pb-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF8966]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Informasi Tambahan
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-control md:col-span-2">
                                <label class="label font-semibold text-slate-600">Pekerjaan</label>
                                <input type="text" value="Mahasiswa"
                                    class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]"
                                    placeholder="Contoh: Mahasiswa, Karyawan Swasta" />
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Status Perkawinan</label>
                                <select
                                    class="select select-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]">
                                    <option>Lajang</option>
                                    <option>Menikah</option>
                                    <option>Cerai</option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Kondisi Tinggal</label>
                                <select
                                    class="select select-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]">
                                    <option>Sendiri</option>
                                    <option>Bersama Orang Tua</option>
                                    <option>Bersama Pasangan</option>
                                    <option>Asrama/Kost</option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Kota / Kabupaten</label>
                                <input type="text" value="Edinburg"
                                    class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]" />
                            </div>

                            <div class="form-control">
                                <label class="label font-semibold text-slate-600">Pendidikan Terakhir</label>
                                <select
                                    class="select select-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]">
                                    <option>SMA / SMK</option>
                                    <option>Diploma</option>
                                    <option>Sarjana (S1)</option>
                                    <option selected>Magister (S2)</option>
                                    <option>Doktor (S3)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-200 flex flex-col-reverse md:flex-row justify-end gap-4">
                        <a href="/profile"
                            class="btn btn-ghost text-slate-500 hover:bg-slate-100 rounded-full px-8 normal-case w-full md:w-auto">
                            Batal
                        </a>

                        <button type="submit"
                            class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-10 shadow-lg hover:shadow-orange-200/50 normal-case text-lg w-full md:w-auto">
                            Simpan Perubahan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </section>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
