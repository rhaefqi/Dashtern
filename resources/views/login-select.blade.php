<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashtern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen bg-cover bg-center flex items-center justify-center"
      style="background-image: url('/image/bg.jpg');">

    <div class="bg-white/30 backdrop-blur-lg rounded-2xl shadow-xl p-10 text-center max-w-md w-full">
        <img src="/image/logo.png" alt="Dashtern Logo" class="mx-auto mb-4 w-24 h-24">
        <h1 class="text-4xl font-bold text-white mb-2">Dashtern</h1>
        <p class="text-white mb-6">Masuk sebagai:</p>

        <!-- Tombol Pilihan -->
        <div class="flex justify-center gap-4">
            <a href="{{ route('login.admin') }}"
            class="bg-white text-black px-6 py-2 rounded-xl font-semibold hover:bg-gray-200 transition">
                Admin
            </a>
            <a href="{{ route('login.mahasiswa') }}"
            class="bg-green-500 text-white px-6 py-2 rounded-xl font-semibold hover:bg-green-600 transition">
                Mahasiswa
            </a>

    </div>

</body>
</html>
