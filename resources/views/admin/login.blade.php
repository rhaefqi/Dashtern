<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Dashtern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('/image/bg.jpg');">

    <div class="flex bg-white/30 backdrop-blur-lg rounded-2xl shadow-xl p-10 w-full max-w-4xl">
        <!-- Kiri: Logo -->
        <div class="w-1/2 flex flex-col items-center justify-center text-white pr-8 border-r border-white/50">
            <img src="/image/logo.png" alt="Logo" class="w-28 h-28 mb-4">
            <h1 class="text-4xl font-bold">Dashtern</h1>
        </div>

        <!-- Kanan: Form -->
        <div class="w-1/2 flex flex-col justify-center pl-8 text-white">
            <h2 class="text-3xl font-bold mb-6">Masuk Admin</h2>
            <form method="POST" action="{{ route('auth.login.admin') }}">
                @csrf
                <div class="mb-4">
                    <label for="kode_admin" class="block text-sm mb-1">Kode Admin</label>
                    <input type="text" id="kode_admin" name="kode_admin" class="w-full px-4 py-2 rounded-lg bg-black/40 text-white focus:outline-none" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm mb-1">Kata Sandi</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg bg-black/40 text-white focus:outline-none" required>
                </div>
                <button type="submit" class="w-full py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-200 transition">Masuk</button>
            </form>
        </div>
    </div>

</body>
</html>
