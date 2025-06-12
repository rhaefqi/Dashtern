@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <!-- Breadcrumb -->
    <div class="text-2xl font-semibold mb-6">
        Tugas &gt; 
        <span class="text-[#145A5A]">{{ $tugas->nama ?? 'Nama Kelas' }}</span> &gt; 
        <span class="text-[#145A5A]">{{ $tugas->judul }}</span>
    </div>

    <!-- Box Detail Tugas -->
    <div class="bg-white rounded-xl shadow p-6 space-y-6">

        <!-- Header: Judul, Tanggal Mulai, dan Deadline -->
        <div class="flex justify-between flex-col sm:flex-row sm:items-start gap-4">
            <div>
                <h2 class="text-xl font-bold text-[#145A5A]">{{ $tugas->nama }}</h2>
                <p class="text-sm text-gray-600 mt-1">
                    Tanggal mulai: {{ \Carbon\Carbon::parse($tugas->created_at)->format('d M Y') }}
                </p>
                <p class="text-sm text-gray-600">
                    Status: <span class="font-semibold text-[#145A5A] capitalize">{{ $tugas->status }}</span>
                </p>
            </div>
            <div class="text-sm text-right text-red-600 font-semibold">
                Deadline: {{ \Carbon\Carbon::parse($tugas->tenggat)->format('d M Y') }}
            </div>
        </div>

        <!-- Deskripsi -->
        <div>
            <h3 class="font-semibold text-[#145A5A] mb-1">Deskripsi Tugas:</h3>
            <p class="text-gray-700 leading-relaxed">
                {{ $tugas->deskripsi }}
            </p>
        </div>

        <!-- Lampiran -->
        @if ($tugas->lampiran)
            <div>
                <h3 class="font-semibold text-[#145A5A] mb-1">Lampiran:</h3>
                <a href="{{ asset('storage/lampiran/' . $tugas->lampiran) }}" target="_blank"
                    class="text-blue-600 underline">
                    Lihat Lampiran
                </a>
            </div>
        @endif

        <!-- Tombol Kumpulkan -->
        <div class="pt-4">
            <a href="{{ route('tugas.form', $tugas->id) }}"
                class="block w-full text-center bg-[#145A5A] hover:bg-[#0e3e3e] text-white font-semibold px-6 py-3 rounded-md transition">
                Kumpulkan Tugas
            </a>
        </div>

    </div>
</div>
@if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: '{{ session('success') }}',
      })
  </script>
  @endif

  @if(session('error'))
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '{{ session('error') }}',
      })
  </script>
  @endif
  
@endsection
