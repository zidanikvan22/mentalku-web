@extends('layout.mainUser')

@section('title', 'Edit Profil - MentalKU')

@section('content')
<div class="pt-24 lg:pt-32"></div>

<section class="container mx-auto px-4 md:px-10 mb-20">

    <div class="max-w-4xl mx-auto mb-8 flex items-center gap-4">
        <a href="{{ route('profile.index') }}" class="btn btn-circle btn-ghost text-slate-500 hover:bg-slate-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-3xl font-extrabold text-[#294C60]">Edit Profil</h1>
    </div>

    <div class="max-w-4xl mx-auto bg-white rounded-[40px] shadow-xl overflow-hidden border border-slate-100 animate-fade-in-up">

        {{-- Perhatikan route action --}}
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- HEADER: FOTO PROFIL --}}
            <div class="bg-[#E0F2FE] p-10 flex flex-col md:flex-row items-center gap-8 border-b border-slate-200">
                <div class="relative group">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-white">
                        {{-- Preview Logic --}}
                        @php
                        $photoUrl = $user->profile_photo_path
                        ? asset('storage/' . $user->profile_photo_path)
                        : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=294C60&color=fff&size=256';
                        @endphp
                        <img id="avatarPreview" src="{{ $photoUrl }}" alt="Avatar Preview" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="flex flex-col gap-3 text-center md:text-left">
                    <h3 class="text-xl font-bold text-[#294C60]">Foto Profil</h3>
                    <p class="text-sm text-slate-500 mb-2">Format: JPG, PNG (Max. 2MB)</p>

                    <div class="flex flex-wrap justify-center md:justify-start gap-3">
                        <label class="btn bg-[#294C60] hover:bg-[#1f3a4a] text-white border-none rounded-full px-6 normal-case cursor-pointer shadow-md">
                            Ganti Gambar
                            <input type="file" name="profile_photo" class="hidden" onchange="previewImage(this)">
                        </label>

                        {{-- Button Hapus (Trigger JS) --}}
                        <button type="button" onclick="markDeletePhoto()"
                            class="btn btn-outline border-rose-400 text-rose-500 hover:bg-rose-50 hover:border-rose-500 hover:text-rose-600 rounded-full px-6 normal-case">
                            Hapus
                        </button>
                        {{-- Input Hidden buat flag delete --}}
                        <input type="hidden" name="delete_photo" id="deletePhotoInput" value="0">
                    </div>
                    @error('profile_photo')
                        <span class="text-sm font-semibold text-rose-500 mt-3">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- FORM FIELDS --}}
            <div class="p-8 md:p-12 space-y-10">

                {{-- INFORMASI DASAR (READ ONLY) --}}
                <div>
                    <h3 class="flex items-center gap-2 text-xl font-bold text-[#294C60] border-b border-slate-200 pb-3 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#0D9488]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Informasi Dasar
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Nama Lengkap</label>
                            <input type="text" value="{{ $user->name }}" readonly
                                class="input input-bordered w-full rounded-xl bg-slate-100 text-slate-500 cursor-not-allowed border-slate-200" />
                        </div>

                        {{-- Username --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Nama Panggilan</label>
                            <input type="text" value="{{ $user->username }}" readonly
                                class="input input-bordered w-full rounded-xl bg-slate-100 text-slate-500 cursor-not-allowed border-slate-200" />
                        </div>

                        {{-- Gender --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Jenis Kelamin</label>
                            <input type="text" value="{{ $user->gender }}" readonly
                                class="input input-bordered w-full rounded-xl bg-slate-100 text-slate-500 cursor-not-allowed border-slate-200" />
                        </div>

                        {{-- Tgl Lahir --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Tanggal Lahir</label>
                            <input type="date" value="{{ $user->birth_date }}" readonly
                                class="input input-bordered w-full rounded-xl bg-slate-100 text-slate-500 cursor-not-allowed border-slate-200" />
                        </div>

                        {{-- Email --}}
                        <div class="form-control md:col-span-2">
                            <label class="label font-semibold text-slate-600">Email</label>
                            <input type="email" value="{{ $user->email }}" readonly
                                class="input input-bordered w-full rounded-xl bg-slate-100 text-slate-500 cursor-not-allowed border-slate-200" />
                        </div>

                        {{-- No HP (Editable) --}}
                        <div class="form-control md:col-span-2">
                            <label class="label font-semibold text-slate-600">Nomor HP / WhatsApp</label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]" placeholder="Contoh: 081234567890"/>
                        </div>
                    </div>
                </div>

                {{-- INFORMASI TAMBAHAN (EDITABLE) --}}
                <div>
                    <h3 class="flex items-center gap-2 text-xl font-bold text-[#294C60] border-b border-slate-200 pb-3 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF8966]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Informasi Tambahan
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Pekerjaan --}}
                        <div class="form-control md:col-span-2">
                            <label class="label font-semibold text-slate-600">Pekerjaan</label>
                            <input type="text" name="job" value="{{ old('job', $user->job) }}"
                                class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]"
                                placeholder="Contoh: Mahasiswa, Karyawan Swasta" />
                        </div>

                        {{-- Status --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Status Perkawinan</label>
                            <select name="marital_status" class="select select-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]">
                                <option value="" disabled selected>Pilih...</option>
                                <option {{ old('marital_status', $user->marital_status) == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                <option {{ old('marital_status', $user->marital_status) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option {{ old('marital_status', $user->marital_status) == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                            </select>
                        </div>

                        {{-- Kondisi Tinggal --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Kondisi Tinggal</label>
                            <select name="living_condition" class="select select-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]">
                                <option value="" disabled selected>Pilih...</option>
                                <option {{ old('living_condition', $user->living_condition) == 'Sendiri' ? 'selected' : '' }}>Sendiri</option>
                                <option {{ old('living_condition', $user->living_condition) == 'Bersama Orang Tua' ? 'selected' : '' }}>Bersama Orang Tua</option>
                                <option {{ old('living_condition', $user->living_condition) == 'Bersama Pasangan' ? 'selected' : '' }}>Bersama Pasangan</option>
                                <option {{ old('living_condition', $user->living_condition) == 'Asrama/Kost' ? 'selected' : '' }}>Asrama/Kost</option>
                            </select>
                        </div>

                        {{-- Kota --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Kota / Kabupaten</label>
                            <input type="text" name="city" value="{{ old('city', $user->city) }}"
                                class="input input-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]" placeholder="Contoh: Jakarta, Bandung, Batam" />
                        </div>

                        {{-- Pendidikan --}}
                        <div class="form-control">
                            <label class="label font-semibold text-slate-600">Pendidikan Terakhir</label>
                            <select name="education" class="select select-bordered w-full rounded-xl focus:outline-[#0D9488] focus:border-[#0D9488]">
                                <option value="" disabled selected>Pilih...</option>
                                <option {{ old('education', $user->education) == 'SMA / SMK' ? 'selected' : '' }}>SMA / SMK</option>
                                <option {{ old('education', $user->education) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                <option {{ old('education', $user->education) == 'Sarjana (S1)' ? 'selected' : '' }}>Sarjana (S1)</option>
                                <option {{ old('education', $user->education) == 'Magister (S2)' ? 'selected' : '' }}>Magister (S2)</option>
                                <option {{ old('education', $user->education) == 'Doktor (S3)' ? 'selected' : '' }}>Doktor (S3)</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- TOMBOL ACTION --}}
                <div class="pt-6 border-t border-slate-200 flex flex-col-reverse md:flex-row justify-end gap-4">
                    <a href="{{ route('profile.index') }}"
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
            // Jika user memilih file baru, batalkan flag delete_photo
            document.getElementById('deletePhotoInput').value = '0';

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Logic Button Hapus
    function markDeletePhoto() {
        // Set input hidden 'delete_photo' jadi 1
        document.getElementById('deletePhotoInput').value = '1';
        // Ganti preview ke default UI Avatar
        document.getElementById('avatarPreview').src = "https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=294C60&color=fff&size=256";
        // Reset file input biar ga ikut ke-upload kalau user berubah pikiran
        document.querySelector('input[type="file"]').value = '';

        alert('Foto akan dihapus saat tombol Simpan ditekan.');
    }
</script>
@endsection