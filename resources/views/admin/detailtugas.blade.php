@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')
<div class="min-h-screen bg-[#e8f0ed] px-4 py-8">
    <h1 class="text-2xl font-semibold mb-6">Detail Tugas</h1>

    <div class="bg-white p-6 rounded-xl shadow-md max-w-5xl mx-auto">
        <div class="flex justify-between items-start mb-2">
            <div class="flex items-start space-x-3">
                <div class="bg-[#163C3C] text-white p-2 rounded-full">
                    <!-- Icon Kalender -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-lg">Judul Tugas 1</h2>
                    <p class="text-sm text-gray-500">Tanggal tugas diposting</p>
                </div>
            </div>
            <div class="text-sm text-red-600 font-semibold">
                Tenggat: Tanggal tenggat tugas
            </div>
        </div>

        <p class="text-gray-700 mt-4 mb-6">
            Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas Deskripsi tugas
        </p>

        <hr class="mb-4">

        <!-- Tambahan Tabel Jawaban -->
        <div class="bg-white border border-gray-300 rounded-xl overflow-x-auto">
            <div class="px-4 pt-4 font-medium text-gray-800">
                Diserahkan: 23/30
            </div>
            <table class="min-w-full text-sm mt-2 table-auto">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2 font-medium text-gray-700 border-b">No</th>
                        <th class="px-4 py-2 font-medium text-gray-700 border-b">NIM</th>
                        <th class="px-4 py-2 font-medium text-gray-700 border-b">Nama</th>
                        <th class="px-4 py-2 font-medium text-gray-700 border-b">Jawaban</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <tr class="border-b">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">221401021</td>
                        <td class="px-4 py-2">Reinata Carolina</td>
                        <td class="px-4 py-2 text-blue-600 underline">
                            <a href="#" target="_blank">link drive</a>
                        </td>
                    </tr>
                    <!-- Tambahkan baris lain jika perlu -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
