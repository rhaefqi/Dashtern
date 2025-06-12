@extends('layouts.app')

@section('title', 'Kelas')

@section('content')
<div class="p-6 bg-[#E7F0EF] min-h-screen">
    <!-- Breadcrumb -->
    <div class="text-2xl font-semibold mb-6">
        Kelas &gt; <span class="text-[#145A5A]">{{ $kelas->nama }}</span>
    </div>

    <!-- Pengumuman Utama -->
    @if ($pengumuman->isNotEmpty())
        <div class="bg-[#145A5A] text-white rounded-lg p-6 mb-8">
            <h3 class="text-lg font-bold mb-2">Pengumuman</h3>
            <div class="space-y-2 text-sm leading-relaxed">
                @foreach($pengumuman as $item)
                    <p><strong>{{ $item->judul }}</strong> - {{ $item->isi }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Daftar Tugas -->
    <div class="space-y-4">
        @forelse($tugas as $item)
            <a href="{{ route('tugas.detail', $item->id) }}" class="block">
                <div class="bg-white shadow rounded-lg p-5 flex items-center space-x-4 hover:bg-gray-100 transition">
                    <div class="bg-[#145A5A] text-white rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-3 -3v6m-6 4h12a2 2 0 002 -2V6a2 2 0 00-2 -2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-sm text-gray-700">
                            Mentor memposting tugas baru: {{ $item->nama }}
                        </p>
                        <p class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                        </p>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-gray-500">Belum ada tugas yang diposting.</p>
        @endforelse
    </div>
</div>
@endsection
