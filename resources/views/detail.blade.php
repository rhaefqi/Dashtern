@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Breadcrumb -->
    <div class="text-2xl font-semibold mb-6">
        Tugas &gt; 
        <span class="text-[#145A5A]">{{ $tugas->tugasKelas->nama ?? 'Nama Kelas' }}</span> &gt; 
        <span class="text-[#145A5A]">{{ $tugas->judul }}</span>
    </div>

    <!-- Box Detail Tugas -->
    <div class="bg-white rounded-xl shadow p-6 space-y-4">

        <!-- Header: Judul dan Deadline -->
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-xl font-bold text-[#145A5A]">{{ $tugas->judul }}</h2>
                <p class="text-sm text-gray-600 mt-1">{{ \Carbon\Carbon::parse($tugas->tanggal_mulai)->format('d M Y') }}</p>
                <p class="text-sm text-gray-600">{{ $tugas->poin }} poin</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-red-600 font-bold">Deadline: {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') }}</p>
            </div>
        </div>

        <!-- Deskripsi Tugas -->
        <div>
            <h3 class="font-semibold text-[#145A5A] mb-1">Deskripsi Tugas:</h3>
            <p class="text-gray-600">
                {{ $tugas->deskripsi }}
            </p>
        </div>

        <!-- Tombol Kumpulkan -->
        <div class="pt-4">
            <a href="{{ route('tugas.form') }}"
                class="block w-full text-center bg-[#145A5A] hover:bg-[#0e3e3e] text-white font-semibold px-6 py-3 rounded-md transition">
                Kumpulkan Tugas
            </a>
        </div>
    </div>
</div>
@endsection
