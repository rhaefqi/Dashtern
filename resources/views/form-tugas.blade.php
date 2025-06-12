@extends('layouts.app')

@section('title', 'Form Kumpulkan Tugas')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Judul -->
    <div class="text-2xl font-semibold mb-6">
        Kumpulkan Tugas &gt; <span class="text-[#145A5A]">{{ $tugas->kode_kelas }}</span> &gt; <span class="text-[#145A5A]">{{ $tugas->nama }}</span>
    </div>

    <!-- Form Box -->
    <div class="bg-white rounded-xl shadow p-6 max-w-xl mx-auto">
        <form action="{{ route('tugas.submit') }}" method="POST">
            @csrf

            <input type="hidden" name="kode_tugas" value="{{ $tugas->id }}">
            <input type="hidden" name="status" value="{{ $tugas->status }}">

            <!-- Input Jumlah Akuisisi -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1" for="jumlah_akuisisi">Jumlah Akuisisi</label>
                <input type="number" id="jumlah_akuisisi" name="jumlah"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#145A5A]"
                    required>
            </div>

            <!-- Input Link Drive -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1" for="link_drive">Link Google Drive</label>
                <input type="url" id="link_drive" name="link_gdrive"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#145A5A]"
                    placeholder="https://drive.google.com/..." required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="w-full bg-[#145A5A] hover:bg-[#0e3e3e] text-white font-semibold py-3 rounded-md transition">
                Submit Tugas
            </button>
        </form>

    </div>
</div>

@endsection


