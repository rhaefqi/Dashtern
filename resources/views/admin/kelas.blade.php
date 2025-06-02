@extends('layouts.app-admin')

@section('title', 'Kelas')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Kelas</h1>

    {{-- Tombol Buat Kelas --}}
    <div class="flex justify-center">
        <a href="{{ route('admin.kelas.create') }}"
            class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-3 rounded-xl shadow w-full max-w-3xl flex justify-center items-center space-x-2">
            <span>Buat Kelas</span>
            <div class="bg-white text-black rounded p-1 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
        </a>
    </div>
    @if (session()->has('success'))
        <div id="successAlert" class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative flex items-center justify-between"
            role="alert">
            <div>
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            <span onclick="document.getElementById('successAlert').classList.add('hidden')"
                class="cursor-pointer">
                ×
            </span>
        </div>
    @elseif(session()->has('failed'))
        <div id="successAlert" class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative flex items-center justify-between"
            role="alert">
            <div>
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('failed') }}</span>
            </div>
            <span onclick="document.getElementById('successAlert').classList.add('hidden')"
                class=" cursor-pointer">
                ×
            </span>
        </div>
    @endif
    @foreach ($kelas as $k)
        <div class="grid grid-cols-1 gap-4 mt-6">
            <div class="flex bg-white rounded-xl shadow p-4 hover:bg-gray-100 transition justify-between">
                <a href="{{ route('admin.kelas.show', $k->kode_kelas) }}" class="flex items-center space-x-4">
                    <img src="{{ asset('image/logo-univ.png') }}" alt="Logo Universitas" class="w-12 h-12 object-contain">
                    <div>
                        <h2 class="text-xl font-bold">{{ $k->nama }} ({{ $k->kode_kelas }})</h2>
                    </div>
                </a>
                <div class="flex items-center">
                    <form id="form-delete-{{ $k->kode_kelas }}" action="{{ route('admin.kelas.delete', $k->kode_kelas) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteKelas('{{ $k->kode_kelas }}')"
                            style="border:none; background:none; !important" class="text-red-500">
                            <i class="fa-solid fa-trash icon-delete"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Tambahkan box kelas lain di sini -->
        </div>
    @endforeach

@endsection
