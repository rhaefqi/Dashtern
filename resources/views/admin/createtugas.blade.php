@extends('layouts.app')

@section('title', 'Buat Tugas')

@section('content')
    <div class="flex justify-center">
        <div class="bg-[#e8f0ed] rounded-xl shadow-md border p-6 w-full max-w-lg">
            <h2 class="text-xl font-semibold text-center mb-6">Buat Tugas</h2>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Judul Tugas --}}
                <div class="mb-4">
                    <label for="judul_tugas" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                    <input type="text" id="judul_tugas" name="judul_tugas" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required>
                </div>

                {{-- Deskripsi Tugas --}}
                <div class="mb-4">
                    <label for="deskripsi_tugas" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                    <textarea id="deskripsi_tugas" name="deskripsi_tugas" rows="4" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required></textarea>
                </div>

                {{-- Lampiran (Opsional) --}}
                <div class="mb-4">
                    <label for="lampiran" class="block text-sm font-medium text-gray-700 mb-1">Lampiran (Opsional)</label>
                    <input type="file" id="lampiran" name="lampiran" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]">
                </div>

                {{-- Tenggat Tanggal & Waktu --}}
                <div class="mb-6">
                    <label for="tenggat" class="block text-sm font-medium text-gray-700 mb-1">Tenggat tanggal & waktu</label>
                    <div class="flex space-x-2">
                        <input type="date" id="tanggal" name="tanggal" class="w-1/2 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required>
                        <input type="time" id="waktu" name="waktu" value="23:59" class="w-1/2 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-between">
                    <a href="{{ route('admin.kelas.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-2 rounded-md">Batal</a>
                    <a href="{{ route('admin.kelas.index') }}" class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-2 rounded-md">Buat</a>
                </div>
            </form>
        </div>
    </div>
@endsection
