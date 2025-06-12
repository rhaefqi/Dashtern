@extends('layouts.app')

@section('title', 'Panduan')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Panduan</h1>

    <div class="grid grid-cols-1 gap-4 mt-6">
        @forelse ($panduans as $panduan)    
            <a href="{{ $panduan->link_drive }}" target="_blank"
               class="block bg-white rounded-xl shadow p-4 hover:bg-gray-100 transition flex justify-between items-center">
                <h2 class="text-xl font-bold">{{ $panduan->judul }}</h2>
                <span class="text-blue-600 hover:underline font-medium">Detail</span>
            </a>
        @empty
            <p class="text-gray-500">Belum ada panduan yang tersedia.</p>
        @endforelse
    </div>
@endsection
