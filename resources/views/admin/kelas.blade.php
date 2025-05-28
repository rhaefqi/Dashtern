@extends('layouts.app-admin')

@section('title', 'Kelas')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Kelas</h1>

    {{-- Tombol Buat Kelas --}}
   <div class="flex justify-center">
    <a href="{{ route('admin.kelas.create') }}" class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-3 rounded-xl shadow w-full max-w-3xl flex justify-center items-center space-x-2">
        <span>Buat Kelas</span>
        <div class="bg-white text-black rounded p-1 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </div>
    </a>
</div>

@endsection
