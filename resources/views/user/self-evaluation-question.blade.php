@extends('layout.mainUser')

@section('title', 'Kuesioner - MentalKU')

@section('content')
<div class="pt-24 lg:pt-32"></div>

<section class="container mx-auto px-4 md:px-0 mb-20 min-h-[60vh] flex flex-col items-center">

    <div class="w-full max-w-3xl bg-white rounded-[40px] shadow-2xl border border-slate-100 overflow-hidden animate-fade-in-up">

        <div class="bg-[#F8FAFC] px-8 py-6 border-b border-slate-100">
            <div class="flex justify-between items-end mb-4">
                <div>
                    <h2 class="text-2xl font-bold text-[#294C60]">Evaluasi Diri</h2>
                    <p class="text-sm text-slate-400">Jawab jujur sesuai kondisi seminggu terakhir.</p>
                </div>
                <div class="text-right">
                    <span class="text-3xl font-extrabold text-[#0D9488]">01</span>
                    <span class="text-sm text-slate-400 font-medium">/ 21</span>
                </div>
            </div>

            <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden">
                <div class="bg-gradient-to-r from-[#294C60] to-[#0D9488] h-3 rounded-full transition-all duration-500 ease-out" style="width: 5%"></div>
            </div>
        </div>

        <div class="p-8 md:p-12">

            <h3 class="text-xl md:text-2xl font-semibold text-[#294C60] leading-relaxed mb-10 text-center">
                "Saya merasa sulit untuk beristirahat atau menenangkan diri."
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <label class="cursor-pointer group relative">
                    <input type="radio" name="answer" value="0" class="peer sr-only">
                    <div class="p-5 rounded-2xl border-2 border-slate-100 bg-white hover:border-[#9BCDE6] hover:bg-[#F0F9FF] peer-checked:border-[#0D9488] peer-checked:bg-[#E0F2FE] peer-checked:ring-1 peer-checked:ring-[#0D9488] transition-all duration-200 flex items-center gap-4">
                        <div class="w-6 h-6 rounded-full border-2 border-slate-300 peer-checked:border-[#0D9488] group-hover:border-[#9BCDE6] flex items-center justify-center">
                            <div class="w-3 h-3 rounded-full bg-[#0D9488] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        </div>
                        <div>
                            <span class="block font-bold text-[#294C60] group-hover:text-[#0D9488]">Tidak Pernah</span>
                            <span class="text-xs text-slate-400">0 - Tidak sesuai dengan saya</span>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-all text-[#0D9488]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>

                <label class="cursor-pointer group relative">
                    <input type="radio" name="answer" value="1" class="peer sr-only">
                    <div class="p-5 rounded-2xl border-2 border-slate-100 bg-white hover:border-[#9BCDE6] hover:bg-[#F0F9FF] peer-checked:border-[#0D9488] peer-checked:bg-[#E0F2FE] peer-checked:ring-1 peer-checked:ring-[#0D9488] transition-all duration-200 flex items-center gap-4">
                        <div class="w-6 h-6 rounded-full border-2 border-slate-300 peer-checked:border-[#0D9488] group-hover:border-[#9BCDE6] flex items-center justify-center">
                            <div class="w-3 h-3 rounded-full bg-[#0D9488] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        </div>
                        <div>
                            <span class="block font-bold text-[#294C60] group-hover:text-[#0D9488]">Kadang-kadang</span>
                            <span class="text-xs text-slate-400">1 - Sesuai sampai tingkat tertentu</span>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-all text-[#0D9488]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>

                <label class="cursor-pointer group relative">
                    <input type="radio" name="answer" value="2" class="peer sr-only">
                    <div class="p-5 rounded-2xl border-2 border-slate-100 bg-white hover:border-[#9BCDE6] hover:bg-[#F0F9FF] peer-checked:border-[#0D9488] peer-checked:bg-[#E0F2FE] peer-checked:ring-1 peer-checked:ring-[#0D9488] transition-all duration-200 flex items-center gap-4">
                        <div class="w-6 h-6 rounded-full border-2 border-slate-300 peer-checked:border-[#0D9488] group-hover:border-[#9BCDE6] flex items-center justify-center">
                            <div class="w-3 h-3 rounded-full bg-[#0D9488] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        </div>
                        <div>
                            <span class="block font-bold text-[#294C60] group-hover:text-[#0D9488]">Sering</span>
                            <span class="text-xs text-slate-400">2 - Sesuai dengan saya cukup sering</span>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-all text-[#0D9488]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>

                <label class="cursor-pointer group relative">
                    <input type="radio" name="answer" value="3" class="peer sr-only">
                    <div class="p-5 rounded-2xl border-2 border-slate-100 bg-white hover:border-[#9BCDE6] hover:bg-[#F0F9FF] peer-checked:border-[#0D9488] peer-checked:bg-[#E0F2FE] peer-checked:ring-1 peer-checked:ring-[#0D9488] transition-all duration-200 flex items-center gap-4">
                        <div class="w-6 h-6 rounded-full border-2 border-slate-300 peer-checked:border-[#0D9488] group-hover:border-[#9BCDE6] flex items-center justify-center">
                            <div class="w-3 h-3 rounded-full bg-[#0D9488] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        </div>
                        <div>
                            <span class="block font-bold text-[#294C60] group-hover:text-[#0D9488]">Hampir Selalu</span>
                            <span class="text-xs text-slate-400">3 - Sangat sesuai dengan saya</span>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 opacity-0 peer-checked:opacity-100 transition-all text-[#0D9488]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>

            </div>
        </div>

        <div class="bg-[#F8FAFC] px-8 py-6 border-t border-slate-100 flex justify-between items-center">
            <button class="btn btn-ghost text-slate-400 hover:text-[#294C60] hover:bg-slate-200 rounded-full px-6 normal-case">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Sebelumnya
            </button>

            <button class="btn bg-[#FF8966] hover:bg-orange-600 text-white border-none rounded-full px-8 shadow-lg hover:shadow-orange-200/50 normal-case">
                Selanjutnya
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

    </div>
</section>
@endsection