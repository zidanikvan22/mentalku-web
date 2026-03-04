<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MentalKU')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* font-family: 'Tienne', serif;
            font-weight: 400; */
        }
    </style>
</head>

<body class="bg-white text-gray-800 antialiased">

    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content flex flex-col">

            @include('component.navbar')

            <main>
                @yield('content')
            </main>

            @include('component.footer')

            @include('component.scrollToTop')
        </div>

        <div class="drawer-side z-50">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>

            @include('component.sidebar')
        </div>
    </div>

    @include('auth.login')
    @include('auth.register')

    <script>
        // Fungsi Buka/Tutup Modal Login
        function toggleLoginModal() {
            const modal = document.getElementById('loginModal');
            // Pastikan di file login.blade.php ID-nya: id="loginModal"
            if (modal) modal.classList.toggle('hidden');
        }

        // Fungsi Buka/Tutup Modal Register
        function toggleRegisterModal() {
            const modal = document.getElementById('registerModal');
            // Pastikan di file register.blade.php ID-nya: id="registerModal"
            if (modal) modal.classList.toggle('hidden');
        }

        // Pindah dari Login ke Register
        function switchToRegister() {
            toggleLoginModal(); // Tutup Login
            setTimeout(() => {
                toggleRegisterModal(); // Buka Register
            }, 200);
        }

        // Pindah dari Register ke Login
        function switchToLogin() {
            toggleRegisterModal(); // Tutup Register
            setTimeout(() => {
                toggleLoginModal(); // Buka Login
            }, 200);
        }

        function closeSidebar() {
            // Uncheck checkbox drawer (sesuai ID di mainUser.blade.php)
            const drawerCheckbox = document.getElementById('my-drawer-3');
            if (drawerCheckbox) {
                drawerCheckbox.checked = false;
            }
        }
    </script>

</body>

</html>
