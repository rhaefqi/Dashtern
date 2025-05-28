@extends('layouts.app')

@section('title', 'gabung')
 
@section('content')
    <h1 class="text-2xl font-semibold mb-4">Kelas</h1>

    <button onclick="openModal()"
      class="w-full flex items-center justify-center gap-2 bg-emerald-900 text-white font-semibold py-3 px-6 rounded-xl shadow-md hover:bg-emerald-800 transition">
      Gabung ke kelas
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
           viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M15 12H3m0 0l4-4m-4 4l4 4m8-10h2a2 2 0 012 2v10a2 2 0 01-2 2h-2" />
      </svg>
    </button>

    

  <!-- Modal -->
  <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 hidden z-50">
    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-sm">
      <h2 class="text-xl font-bold text-center mb-4">Gabung kelas</h2>
      
      <label for="kodeKelas" class="block mb-2 text-gray-700">Masukkan kode kelas:</label>
      <input id="kodeKelas" type="text" placeholder="Contoh: ABC123"
             class="w-full px-4 py-2 mb-4 rounded-xl bg-gray-200 focus:outline-none focus:ring-2 focus:ring-emerald-600"/>

      <button onclick="joinClass()" class="w-full bg-emerald-900 text-white py-2 rounded-xl font-semibold hover:bg-emerald-800 transition">
        Gabung
      </button>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById("modal").classList.remove("hidden");
    }

    function joinClass() {
      const kode = document.getElementById("kodeKelas").value.trim();
      if (kode === "") {
        alert("Kode kelas tidak boleh kosong!");
        return;
      }

      // Simulasi validasi dan redirect
      window.location.href = "/kelas"; // arahkan ke halaman kelas
    }
  </script>
@endsection
