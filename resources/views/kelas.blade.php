@extends('layouts.app')

@section('title', 'Kelas')
 
@section('content')
    <h1 class="text-2xl font-semibold mb-4">Kelas</h1>

    <div class="grid grid-cols-1 gap-4 mt-6">
       <a href="{{ route('tugas.index', ['kode_kelas' => $kelas->kode_kelas]) }}" class="block bg-white rounded-xl shadow p-4 hover:bg-gray-100 transition">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('image/logo-univ.png') }}" alt="Logo Universitas" class="w-12 h-12 object-contain">
                <div>
                    <h2 class="text-xl font-bold">{{ $kelas->nama ?? 'Nama kelas tidak ditemukan' }}</h2>
                </div>
            </div>
        </a>
        <!-- Tambahkan box kelas lain di sini -->   
    </div>
@endsection
