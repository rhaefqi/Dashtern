@extends('layouts.app')

@section('title', 'Profil')

@section('content')

<div class="text-2xl font-semibold mb-4">
        Profil &gt; <span class="text-[#145A5A]">Ganti Kata Sandi</span>
    </div>
<div class="mx-auto w-full max-w-md p-6 bg-white rounded-lg shadow-md">

    <h2 class="text-xl font-semibold text-gray-800 mb-4">Ganti Kata Sandi</h2>

    <form id="changePasswordForm" method="POST" action="{{ route('ganti-pass-validated') }}" class="space-y-4">
      @csrf
      <!-- Kata Sandi Lama -->
      <div>
        <label for="oldPassword" class="block text-sm font-medium text-gray-700">
          Kata Sandi Lama <span class="text-red-500">*</span>
        </label>
        <input type="password" name="old_password" id="oldPassword" required
          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0b3d36]" />
      </div>

      <!-- Kata Sandi Baru -->
      <div>
        <label for="newPassword" class="block text-sm font-medium text-gray-700">
          Kata Sandi Baru <span class="text-red-500">*</span>
        </label>
        <input type="password" name="new_password" id="newPassword" required
          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0b3d36]" />
      </div>

      <!-- Konfirmasi Kata Sandi -->
      <div>
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">
          Konfirmasi Kata Sandi Baru <span class="text-red-500">*</span>
        </label>
        <input type="password" name="confirm_password" id="confirmPassword" required
          class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#0b3d36]" />
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full bg-[#0b3d36] text-white font-semibold py-2 rounded-md hover:bg-[#072a25] transition">
        Ubah Kata Sandi
      </button>
    </form>

   <script>
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const oldPassword = document.getElementById('oldPassword').value;
      const newPassword = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;

      const passwordPattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

      if (!passwordPattern.test(newPassword)) {
        Swal.fire({
          icon: 'warning',
          title: 'Oops!',
          text: 'Kata sandi baru harus memiliki minimal 8 karakter, satu huruf kapital, dan satu angka.'
        });
        return;
      }

      if (newPassword !== confirmPassword) {
        Swal.fire({
          icon: 'error',
          title: 'Konfirmasi Tidak Cocok',
          text: 'Konfirmasi kata sandi tidak sama.'
        });
        return;
      }

      this.submit(); // kirim form ke backend
    });
</script>

  @if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: '{{ session('success') }}',
          timer: 3000,
          showConfirmButton: false
      });
  </script>
  @endif

  @if($errors->any())
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          html: `{!! implode('<br>', $errors->all()) !!}`,
      });
  </script>
  @endif



@endsection