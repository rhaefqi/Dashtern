@extends('layouts.app-admin')

@section('title', 'Buat Kelas')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Kelas</h1>

    <div class="flex justify-center">
        <div class="bg-white rounded-xl shadow border p-6 w-full max-w-md">
            <h2 class="text-xl font-semibold text-center mb-6">Buat kelas</h2>

            <form action="{{ route('admin.kelas.store') }}" method="POST">
                @csrf

                {{-- Nama Kelas --}}
                <div class="mb-4">
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas :</label>
                    <input type="text" id="nama_kelas" name="nama_kelas" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required>
                </div>

                {{-- Waktu Program Magang --}}
                <div class="mb-6">
                    <label for="durasi" class="block text-sm font-medium text-gray-700 mb-1">Waktu Program Magang :</label>
                    <div class="flex items-center space-x-2">
                        <select id="durasi" name="durasi" class="border px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]">
                            @for ($i = 1; $i <= 6; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <span>bulan</span>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-between">
                    <a href="{{ route('admin.kelas.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-2 rounded-md">Batal</a>
                    <button type="submit" class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-2 rounded-md inline-block text-center">
                        Buat
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
