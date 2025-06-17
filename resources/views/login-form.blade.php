<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Dashtern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="icon" href="{{ asset('image/logo.png') }}" type="image/png">
</head>

<body class="h-screen w-screen bg-cover bg-center flex items-center justify-center"
    style="background-image: url('/image/bg.jpg');">

    <div class="flex bg-white/30 backdrop-blur-lg rounded-2xl shadow-xl p-10 w-full max-w-4xl">
        <!-- Kiri: Logo -->
        <div class="w-1/2 flex flex-col items-center justify-center text-white pr-8 border-r border-white/50">
            <img src="/image/logo.png" alt="Logo" class="w-28 h-28 mb-4">
            <h1 class="text-4xl font-bold">Dashtern</h1>
        </div>

        @if (session('error'))
            <script>
                window.onload = () => gagalNim()
            </script>
        @endif

        <!-- Kanan: Form -->
        <div class="w-1/2 flex flex-col justify-center pl-8 text-white">
            <h2 class="text-3xl font-bold mb-6">Masuk</h2>
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
                <div class="mb-4">
                    <label for="nim" class="block text-sm mb-1">NIM</label>
                    <input type="text" id="username" name="username"
                        class="w-full px-4 py-2 rounded-lg bg-black/40 text-white focus:outline-none" required>
                        <input type="hidden" name="status" value="mahasiswa">
                </div>
                <div class="mb-6 relative">
                    <label for="password" class="block text-sm mb-1">Kata Sandi</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 rounded-lg bg-black/40 text-white focus:outline-none" required>
                    <!-- Tombol show/hide -->
                    <span class="absolute right-3 top-8 cursor-pointer" onclick="togglePassword()" title="Tampilkan / Sembunyikan">
                        <i id="eyeHide" class="fa-solid fa-eye hidden" style = " color : #000000";></i>
                        <i id="eyeShow" class="fa-solid fa-eye-slash" style = " color : #000000";></i>
                    </span>
                    @error('login')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-200 transition">Masuk</button>
            </form>
        </div>
    </div>

    @stack('scripts')
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const eyeShow = document.getElementById('eyeShow');
        const eyeHide = document.getElementById('eyeHide');

        if (input.type === 'password') {
            input.type = 'text';
            eyeShow.classList.add('hidden');
            eyeHide.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeShow.classList.remove('hidden');
            eyeHide.classList.add('hidden');
        }
    }
</script>
</html>
