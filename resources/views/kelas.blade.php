@extends('layouts.app')

@section('title', 'Kelas')

@section('content')
    <div class="max-w-7xl mx-auto space-y-6 font-sans px-4 pt-2">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">🎓 Kelas</h1>
            <p class="text-gray-500 text-sm mt-1">Kelas untuk melihat daftar tugas dan pengumuman</p>
        </div>
        <div class="flex items-center space-x-2 text-gray-600 mt-4 md:mt-0">
            <i class="fas fa-calendar-alt"></i>
            <span class="text-sm font-medium">{{ \Carbon\Carbon::now()->format('j F, Y') }}</span>
        </div>
    </div>

    <!-- Box Kelas -->
    <div>
        <a href="{{ route('tugas.index', ['kode_kelas' => $kelas->kode_kelas]) }}"
            class="relative block bg-white rounded-2xl shadow-md overflow-hidden group border-l-4 border-violet-300">

            <!-- Background batik -->
            <div class="absolute inset-0 z-0 opacity-5">
                <img src="{{ asset('image/batik.svg') }}" class="w-full h-full object-cover" alt="Ornamen Batik">
            </div>

            <!-- Konten utama -->
            <div class="relative z-10 flex items-center gap-4 p-6">
                <!-- Icon Universitas -->
                <div class="bg-violet-100 p-4 rounded-full text-violet-600">
                    <!-- Ganti dengan inline SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                        <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                        <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                        <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                    </svg>
                </div>

                <!-- Info -->
                <div class="flex flex-col">
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-violet-700">
                        {{ $kelas->nama ?? 'Nama kelas tidak ditemukan' }}
                    </h2>
                    <p class="text-sm text-gray-600 italic">Terdaftar sebagai Mahasiswa</p>
                    <p class="text-xs text-gray-400 mt-0.5">Klik untuk melihat tugas dan pengumuman</p>
                </div>
            </div>
        </a>
    </div>

     <div class="flex items-center gap-4 px-6 py-4 bg-indigo-50 border-l-4 border-indigo-300 rounded-xl shadow-sm">
        <!-- Ilustrasi -->
        <div class="flex-shrink-0">
            <img src="{{ asset('image/icon-kelas.svg') }}" alt="Ilustrasi Kelas" class="w-28 animate-fadeIn">
        </div>

        <!-- Motivasi -->
        <div class="text-yellow-800 px-2">
            <h3 class="font-bold text-lg md:text-xl">Tetap Semangat Belajar!</h3>
            <p class="text-sm mt-1 leading-relaxed max-w-xl gap-y-2">
                "Pendidikan adalah menyalakan api, bukan mengisi bejana. 
                Tujuannya bukan sekadar menghafal, tapi menghidupkan rasa ingin tahu dan mencintai kebenaran."<br>
                <span class="italic">– Socrates</span>
            </p>
        </div>
    </div>


</div>
@endsection

