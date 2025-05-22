@extends('layouts.app')

@section('title', 'Profil')

@section('content')

<div class="text-2xl font-semibold mb-4">
        Profil &gt; <span class="text-[#145A5A]">Ganti Kata Sandi</span>
    </div>
<div class="mx-auto w-full max-w-md p-6 bg-white rounded-lg shadow-md">

    <h2 class="text-xl font-semibold text-gray-800 mb-4">Ganti Kata Sandi</h2>

    <form id="changePasswordForm" class="space-y-4">
      <!-- Kata Sandi Lama -->
      <div>
        <label for="oldPassword" class="block text-sm font-medium text-gray-700">
          Kata Sandi Lama <span class="text-red-500">*</span>
        </label>
        <input type="password" id="oldPassword" required
          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0b3d36]" />
      </div>

      <!-- Kata Sandi Baru -->
      <div>
        <label for="newPassword" class="block text-sm font-medium text-gray-700">
          Kata Sandi Baru <span class="text-red-500">*</span>
        </label>
        <input type="password" id="newPassword" required
          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0b3d36]" />
      </div>

      <!-- Konfirmasi Kata Sandi -->
      <div>
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">
          Konfirmasi Kata Sandi Baru <span class="text-red-500">*</span>
        </label>
        <input type="password" id="confirmPassword" required
          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0b3d36]" />
      </div>

      <!-- Button -->
      <button type="submit" href="{{ route('profil.ganti-password.update') }}"
        class="w-full bg-[#0b3d36] text-white font-semibold py-2 rounded-md hover:bg-[#072a25] transition">
        Ubah Kata Sandi
      </button>
    </form>

    <!-- Notifikasi -->
    <div id="successAlert" class="hidden mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative" role="alert">
      <strong class="font-bold">Berhasil!</strong>
      <span class="block sm:inline">Kata sandi telah diubah.</span>
      <span onclick="document.getElementById('successAlert').classList.add('hidden')" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
        ×
      </span>
    </div>
  </div>

  <!-- Script Validasi -->
  <script>
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const oldPassword = document.getElementById('oldPassword').value;
      const newPassword = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      const alertBox = document.getElementById('successAlert');

      const passwordPattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

      if (!passwordPattern.test(newPassword)) {
        alert('Kata sandi baru harus memiliki minimal 8 karakter, satu huruf kapital, dan satu angka.');
        return;
      }

      if (newPassword !== confirmPassword) {
        alert('Konfirmasi kata sandi tidak cocok.');
        return;
      }

      // Simulasikan berhasil
      alertBox.classList.remove('hidden');

      // Reset form
      this.reset();
    });
  </script>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection