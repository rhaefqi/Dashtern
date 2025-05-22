@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Breadcrumb -->
    <div class="text-2xl font-semibold mb-6">
        Tugas &gt; <span class="text-[#145A5A]">Universitas Sumatera Utara</span> &gt; <span class="text-[#145A5A]">Akuisisi Bulan Ke-1</span>
    </div>

    <!-- Box Detail Tugas -->
    <div class="bg-white rounded-xl shadow p-6 space-y-4">

        <!-- Header: Judul dan Deadline -->
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-xl font-bold text-[#145A5A]">Akuisisi Bulan Ke-1</h2>
                <p class="text-sm text-gray-600 mt-1">20 Mei 2025</p>
                <p class="text-sm text-gray-600">100 poin</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-red-600 font-bold">Deadline: 28 Mei 2025</p>
            </div>
        </div>

        <!-- Deskripsi Tugas -->
        <div>
            <h3 class="font-semibold text-[#145A5A] mb-1">Deskripsi Tugas:</h3>
            <p class="text-gray-600">
                Mahasiswa diminta untuk melakukan akuisisi data dari sumber yang telah ditentukan, kemudian membersihkannya, dan menyusun laporan awal dalam bentuk PDF. Sertakan juga sumber data dan langkah-langkah yang dilakukan.
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
