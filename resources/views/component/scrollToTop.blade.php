<button id="scrollToTopBtn" onclick="scrollToTop()"
    class="fixed bottom-8 right-8 z-[999] p-3 rounded-full shadow-lg transition-all duration-300 transform translate-y-10 opacity-0 invisible hover:scale-110 focus:outline-none bg-[#E0F2FE] text-white hover:bg-[#78c4f7]">

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
</button>

<script>
    // Ambil elemen tombol
    const scrollBtn = document.getElementById('scrollToTopBtn');

    // Fungsi Deteksi Scroll
    window.onscroll = function() {
        // Kalau scroll udah lebih dari 300px dari atas
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            // Munculin Tombol
            scrollBtn.classList.remove('translate-y-10', 'opacity-0', 'invisible');
            scrollBtn.classList.add('translate-y-0', 'opacity-100', 'visible');
        } else {
            // Umpetin Tombol
            scrollBtn.classList.remove('translate-y-0', 'opacity-100', 'visible');
            scrollBtn.classList.add('translate-y-10', 'opacity-0', 'invisible');
        }
    };

    // Fungsi Klik buat Scroll ke Atas
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Efek scroll halus (wajib biar UX enak)
        });
    }
</script>
