@extends('layout.mainUser')

@section('title', 'Ruang Bercerita - MentalKU')

@section('content')
{{--
    WRAPPER UTAMA
    - h-screen: Menggunakan tinggi layar penuh.
    - pt-20: Padding untuk navbar.
    - flex-col justify-center: Memastikan card benar-benar di tengah vertikal.
--}}
<section class="h-screen pt-20 pb-8 px-4 flex flex-col justify-center items-center bg-[#F8FAFC]">

    {{--
        CARD UTAMA
        - max-w-6xl: Dibuat lebih LEBAR (Wide) agar terlihat lega.
        - max-h-[550px]: Dibatasi tingginya agar muat di antara Navbar & Footer tanpa scroll page.
        - flex-col: Header di atas, konten di bawah.
    --}}
    <div
        class="w-full max-w-6xl bg-white rounded-[32px] shadow-xl border border-slate-100 overflow-hidden flex flex-col h-full max-h-[550px] animate-fade-in-up">

        {{-- 1. HEADER (BAGIAN 4) - Full Width --}}
        <div class="bg-white px-8 py-5 border-b border-slate-100 z-10 shrink-0">
            <div class="flex justify-between items-center mb-3">
                <div>
                    <h2 class="text-xl font-bold text-[#294C60]">Bagian 4: Ruang Bercerita</h2>
                    <p class="text-xs text-slate-400 mt-1">Ekspresikan perasaanmu.</p>
                </div>
                <div class="text-right">
                    <span class="text-2xl font-extrabold text-[#0D9488]">4</span>
                    <span class="text-sm text-slate-400 font-medium">/ 4 Bagian</span>
                </div>
            </div>

            {{-- Progress Bar (100% Penuh karena langkah terakhir) --}}
            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                <div class="bg-gradient-to-r from-[#294C60] to-[#0D9488] h-2.5 rounded-full transition-all duration-500 ease-out shadow-[0_0_10px_rgba(13,148,136,0.5)]"
                    style="width: 100%"></div>
            </div>
        </div>

        {{-- 2. KONTEN BODY (Split Kiri & Kanan) --}}
        <div class="flex flex-row flex-grow overflow-hidden">

            {{-- KOLOM KIRI: Ilustrasi (Hidden on Mobile) --}}
            <div
                class="hidden lg:flex w-2/5 bg-[#E0F2FE] relative flex-col items-center justify-center p-8 text-center border-r border-slate-100">
                {{-- Pattern Background --}}
                <div
                    class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                </div>

                <div class="relative z-10 flex flex-col items-center justify-center -mt-20">
                    <img src="{{ asset('assets/img/illustrations/ilustrasi_v1.png') }}" alt="Writing Illustration"
                        class="w-56 drop-shadow-xl hover:scale-105 transition-transform duration-500">

                    <div class="max-w-xs -mt-14">
                        <h3 class="text-xl font-bold text-[#294C60] mb-1">Ruang Amanmu.</h3>
                        <p class="text-slate-600 text-xs leading-relaxed mb-4">
                            Tulisan ini dienkripsi dan hanya untuk matamu sendiri. Tidak ada penghakiman di sini.
                        </p>
                        <div
                            class="inline-flex items-center gap-2 bg-white/60 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm text-[#0D9488] text-[10px] font-bold border border-white/50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Privasi Terjamin
                        </div>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: Form Input --}}
            <div class="w-full lg:w-3/5 p-6 md:p-8 flex flex-col h-full bg-white">

                <div class="mb-3 shrink-0">
                    <h1 class="text-xl font-bold text-[#294C60]">Apa yang sedang dirasakan?</h1>
                </div>

                {{-- Update Action ke 'evaluation.submit' --}}
                <form id="ventForm" action="{{ route('evaluation.submit') }}" method="POST" class="flex-grow flex flex-col min-h-0">
                    @csrf

                    {{-- Textarea --}}
                    {{-- <div class="relative flex-grow mb-4 group"> --}}
                        {{-- Tambahkan name="vent" dan isi value dari session --}}
                        {{-- <textarea name="vent"
                            class="w-full h-full bg-[#F8FAFC] border border-slate-200 rounded-2xl p-5 text-sm md:text-base text-slate-700 leading-relaxed resize-none focus:outline-none focus:ring-2 focus:ring-[#0D9488]/20 focus:border-[#0D9488] transition-all placeholder:text-slate-300 custom-scrollbar"
                            placeholder="Mulai menulis di sini...&#10;Contoh: 'Hari ini rasanya berat sekali karena...'">{{ $existingVent }}</textarea>
                    </div> --}}

                    {{-- Textarea --}}
                    <div class="relative flex-grow mb-4 flex flex-col group">
                        {{-- 
                            The UX Fix: 
                            1. Pasang required, minlength, maxlength biar dicegat langsung oleh browser sebelum hit server.
                            2. Pakai old('vent', $existingVent) biar kalau kena error, tulisan capek-capek user gak hilang!
                            3. Dynamic border warna merah kalau kena error Laravel.
                        --}}
                        <textarea name="vent" id="vent"
                            {{-- required minlength="10" maxlength="1000" --}}
                            class="w-full h-full bg-[#F8FAFC] border @error('vent') border-rose-500 ring-2 ring-rose-500/20 @else border-slate-200 focus:border-[#0D9488] focus:ring-[#0D9488]/20 @enderror rounded-2xl p-5 text-sm md:text-base text-slate-700 leading-relaxed resize-none focus:outline-none focus:ring-2 transition-all placeholder:text-slate-300 custom-scrollbar"
                            placeholder="Mulai menulis di sini...&#10;Contoh: 'Hari ini rasanya berat sekali karena...'">{{ old('vent', $existingVent) }}</textarea>

                        {{-- Pesan Error Validasi dari Laravel --}}
                        @error('vent')
                            <div class="text-rose-500 text-xs font-bold mt-2 px-2 flex items-center gap-1 animate-fade-in-up">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        
                        {{-- Character Counter (Opsional tapi UX-nya level dewa) --}}
                        <div class="absolute bottom-3 right-4 text-[10px] font-bold text-slate-300 group-focus-within:text-[#0D9488] transition-colors pointer-events-none bg-white/80 px-2 py-0.5 rounded-full">
                            Maks 1000 karakter
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex justify-between items-center shrink-0 pt-2 border-t border-slate-50">

                        {{-- Tombol SEBELUMNYA (Balik ke Page 3) --}}
                        <a href="{{ route('evaluation.question', ['page' => 3]) }}"
                            class="btn btn-ghost btn-sm text-slate-400 hover:text-[#294C60] rounded-full normal-case font-normal gap-2 pl-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Sebelumnya
                        </a>

                        {{-- Tombol SIMPAN / SELESAI --}}
                        <button id="submitBtn" type="submit"
                            class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-4 md:px-8 h-10 min-h-[2.5rem] text-xs md:text-sm shadow-md hover:shadow-lg flex items-center gap-1 md:gap-2 transition-all">
                            <span>Selesai & Lihat Hasil</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- OVERLAY LOADING SCREEN (Hidden by default) --}}
    <div id="loadingOverlay" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-[100] hidden flex-col items-center justify-center opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-[24px] p-8 md:p-10 flex flex-col items-center shadow-2xl max-w-sm w-[90%] transform scale-95 transition-transform duration-300" id="loadingModal">
            
            {{-- Animated Brain / Spinner Indicator --}}
            <div class="relative w-20 h-20 mb-6">
                <div class="absolute inset-0 rounded-full border-4 border-slate-100"></div>
                <div class="absolute inset-0 rounded-full border-4 border-[#0D9488] border-t-transparent animate-spin"></div>
                <div class="absolute inset-0 flex items-center justify-center text-[#294C60]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>

            <h3 class="text-xl font-extrabold text-[#294C60] mb-2 text-center">Menyiapkan Hasilmu...</h3>
            <p class="text-sm text-slate-500 text-center leading-relaxed">
                AI kami sedang membaca curhatanmu secara rahasia dan menyusun rekomendasi personal. <br> <span class="font-bold text-[#FF8966] animate-pulse">Mohon tunggu sebentar.</span>
            </p>
        </div>
    </div>
</section>

{{-- Style Scrollbar Internal --}}
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 20px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #94a3b8;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ventForm = document.getElementById('ventForm');
        const submitBtn = document.getElementById('submitBtn');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const loadingModal = document.getElementById('loadingModal');

        ventForm.addEventListener('submit', function(e) {
            // Kita biarkan HTML5 validation jalan dulu (kalau ada)
            
            // 1. Tampilkan Overlay
            loadingOverlay.classList.remove('hidden');
            loadingOverlay.classList.add('flex');
            
            // 2. Trigger Animasi Fade & Scale
            setTimeout(() => {
                loadingOverlay.classList.remove('opacity-0');
                loadingOverlay.classList.add('opacity-100');
                loadingModal.classList.remove('scale-95');
                loadingModal.classList.add('scale-100');
            }, 10); // small delay for CSS transition to catch

            // 3. Disable tombol biar gak di-klik 2 kali
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses...
            `;
        });
    });
</script>
@endsection