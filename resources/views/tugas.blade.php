@extends('layouts.app')

@section('title', 'Kelas')

@section('content')

<!-- Halaman Kelas -->
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Breadcrumb -->
    <div class="text-2xl font-semibold mb-4">
        Kelas &gt; <span class="text-[#145A5A]">Universitas Sumatera Utara</span>
    </div>

    <!-- Daftar Tugas -->
    <div class="space-y-6">
        <!-- Card Tugas 1 -->
        <a href="{{ route('tugas.detail', ['id' => 1]) }}" class="block">
            <div class="bg-white shadow rounded-lg p-5 flex justify-between items-center hover:bg-gray-100 transition">
                <div>
                    <h2 class="text-lg font-semibold text-[#145A5A]">Akuisisi Bulan Ke-1</h2>
                    <p class="text-sm text-gray-500">Deadline: 28 Mei 2025</p>
                </div>
            </div>
        </a>

        <!-- Card Tugas 2 -->
        <a href="{{ route('tugas.detail', ['id' => 2]) }}" class="block">
            <div class="bg-white shadow rounded-lg p-5 flex justify-between items-center hover:bg-gray-100 transition">
                <div>
                    <h2 class="text-lg font-semibold text-[#145A5A]">Akuisisi Bulan Ke-2</h2>
                    <p class="text-sm text-gray-500">Deadline: 4 Juni 2025</p>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection
