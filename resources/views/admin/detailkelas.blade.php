@extends('layouts.app')

@section('title', 'Detail Kelas')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Kelas › Nama Kelas</h1>

    @php
        $tab = request()->get('tab', 'pengumuman'); // default ke pengumuman
    @endphp

    {{-- Navigasi Tab --}}
    <div class="flex space-x-4 mb-6">
        <a href="?tab=pengumuman" class="{{ $tab == 'pengumuman' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Pengumuman
        </a>
        <a href="?tab=tugas" class="{{ $tab == 'tugas' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Tugas Kelas
        </a>
        <a href="?tab=orang" class="{{ $tab == 'orang' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Orang
        </a>
        <a href="?tab=dashboard" class="{{ $tab == 'dashboard' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Dashboard
        </a>
    </div>

    <!-- Tombol Buat -->
    <div class="flex justify-center mb-6">
        <button onclick="openModal()" class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-2 rounded-xl shadow flex items-center space-x-2">
            <span>Buat</span>
            <div class="bg-white text-black rounded p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
        </button>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-[#E8F0EF] w-full max-w-md mx-auto p-6 rounded-xl shadow-lg">
            <h2 class="text-xl font-bold text-center mb-4">Buat Pengumuman</h2>

            <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="konten" class="block mb-2">Umumkan sesuatu pada kelas Anda</label>
                    <textarea name="konten" id="konten" rows="4" class="w-full p-3 rounded border border-gray-300"></textarea>
                </div>

                <div class="mb-4">
                    <label for="lampiran" class="block mb-2">Tambahkan lampiran</label>
                    <input type="file" name="lampiran" id="lampiran" class="w-full p-2 border rounded">
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="closeModal()" class="bg-white border border-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-[#163C3C] text-white px-4 py-2 rounded hover:bg-[#102d2d]">Buat</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
        document.getElementById('modal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('modal').classList.remove('flex');
    }
    </script>


    {{-- Konten Berdasarkan Tab --}}
    <div class="bg-white rounded-xl shadow p-6">
        @if ($tab == 'pengumuman')
            <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
            <p>Ini adalah konten pengumuman kelas.</p>

        @elseif ($tab == 'tugas')
            <h2 class="text-xl font-semibold mb-4">Tugas Kelas</h2>
            <p>Daftar tugas yang harus dikerjakan akan muncul di sini.</p>

        @elseif ($tab == 'orang')
            <h2 class="text-xl font-semibold mb-4">Orang</h2>
            <p>Daftar peserta dan instruktur kelas.</p>

        @elseif ($tab == 'dashboard')
            <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
            <p>Statistik, progres, dan ringkasan informasi kelas.</p>

        @else
            <p>Tab tidak dikenali.</p>
        @endif
    </div>
@endsection