@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="max-w-7xl mx-auto space-y-6 font-sans px-4 pt-2">
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between px-6 pb-2 rounded-2xl space-y-4 md:space-y-0">
            <!-- Title -->
            <h1 class="text-2xl font-semibold text-gray-800">📊 Dashboard</h1>

            <!-- Date -->
            <div class="flex items-center space-x-2 text-gray-600">
                <i class="fas fa-calendar-alt"></i>
                <span class="text-sm font-medium">{{ \Carbon\Carbon::now()->format('j F, Y') }}</span>
            </div>

        <!-- Profile -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('image/profile-2.svg') }}" class="w-8 h-8 rounded-full object-cover" alt="Profile">
                <div class="text-sm leading-tight text-left">
                    <div class="font-semibold">{{ $mahasiswa->nama }}</div>
                    <div class="text-gray-500 text-xs">Mahasiswa Magang</div>
                </div>
            </div>
        </div>

        <div class="bg-white px-6 py-4 rounded-2xl shadow-md">
            <div class="flex items-center">
                <h3 class="text-blue-400 font-semibold flex items-center gap-2">
                    <span class="inline-flex text-2xl items-center align-middle">⚠️</span>
                        Untuk menjaga keamanan data, mohon segera ganti password akun Anda guna mencegah akses tidak sah dan memastikan perlindungan akun tetap terjaga.
                </h3>
            </div>
        </div>

           <div class="flex flex-col lg:flex-row gap-6">
            <!-- Greeting Card -->
             <div class="bg-white rounded-3xl shadow-lg p-6 w-full lg:w-2/3 flex flex-col lg:flex-row justify-between items-center">
                <div class="space-y-2 px-2">
                    <h1 class="text-2xl md:text-3xl font-semibold text-gray-800">Hi, {{ $mahasiswa->nama }}!</h1>
                    <p class="text-gray-500 text-sm md:text-base">Selamat datang di Dashtern BPJS Ketenagakerjaan!</p>
                    <p class="text-gray-700 text-sm md:text-base py-1 pb-3">Dashtern adalah website penilaian untuk mahasiswa magang BPJS Ketenagakerjaan</p>
                    <div class="flex flex-wrap gap-3 text-sm md:text-base pt-2">
                        <a href="https://www.bpjsketenagakerjaan.go.id/">
                            <span class="text-pink-500 cursor-pointer">BPJS Ketenagakerjaan</span>
                        </a>
                        <a href="{{ route('progres') }}">
                            <span class="text-yellow-500 cursor-pointer">Progress Kinerja</span>
                        </a>
                        <a href="{{ route('gabung') }}">
                            <span class="text-indigo-500 cursor-pointer">Kelas Mahasiswa</span>
                        </a>
                        <a href="{{ route('tentang') }}">
                            <span class="text-green-500 cursor-pointer">Tentang Dashtern</span>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('image/greeting.svg') }}" alt="Greeting" class="w-32 h-32 md:w-40 md:h-40 mt-6 md:mt-6" />
            </div>

            <!-- Panduan -->
            @php
                $colors = [
                    ['bg' => 'bg-yellow-100', 'dot' => 'bg-yellow-400', 'text' => 'text-yellow-800'],
                    ['bg' => 'bg-red-100', 'dot' => 'bg-red-400', 'text' => 'text-red-800'],
                    ['bg' => 'bg-blue-100', 'dot' => 'bg-blue-400', 'text' => 'text-blue-800'],
                ];
            @endphp

            <div class="bg-white p-6 rounded-3xl shadow-md w-full lg:w-1/3">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Panduan</h2>
                    <a href="{{ route('panduan.index') }}">
                        <span class="text-sm text-blue-500 cursor-pointer">See all</span>
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($panduanTerbaru as $index => $panduan)
                        @php
                            $color = $colors[$index % count($colors)];
                        @endphp
                        <div class="flex items-start gap-3 p-3 rounded-lg {{ $color['bg'] }}">
                            <div class="h-2 w-2 mt-2 rounded-full {{ $color['dot'] }}"></div>
                            <p class="text-sm {{ $color['text'] }}">
                                {{ \Illuminate\Support\Str::limit($panduan->judul, 50) }}
                            </p>
                        </div>
                        @empty
                        <div class="flex flex-col items-center justify-center text-center text-gray-500">
                            <img src="{{ asset('image/panduan-kosong.svg') }}" alt="No Data" class="w-24 h-24 mb-6">
                            <p class="text-lg font-semibold">Belum ada panduan yang tersedia</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

       <!-- Grid utama 3 bagian (Galeri: 2/4, Quotes: 1/4, Kontak: 1/4) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start mt-8 justify-between">

            <!-- Galeri Kegiatan (col-span-2) -->
            <div class="bg-white p-6 rounded-3xl shadow-md col-span-1 md:col-span-2">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Galeri Kegiatan</h2>
                <div class="grid grid-cols-2 gap-3">
                    <img src="{{ asset('image/sosialisasi.jpg') }}" class="rounded-lg object-cover w-full h-32 md:h-40" alt="Kegiatan 1">
                    <img src="{{ asset('image/sosialisasi-mahasiswa.jpg') }}" class="rounded-lg object-cover w-full h-32 md:h-40" alt="Kegiatan 2">
                    <img src="{{ asset('image/sosialisasi-kepling.jpg') }}" class="rounded-lg object-cover w-full h-32 md:h-40" alt="Kegiatan 3">
                    <img src="{{ asset('image/pekerja-kantor.jpg') }}" class="rounded-lg object-cover w-full h-32 md:h-40" alt="Kegiatan 4">
                </div>
            </div>

            <!-- Quotes (col-span-1) -->
            <div class="flex flex-col gap-4 col-span-1">
                <!-- Quote 1 -->
                <div class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-6 rounded-3xl shadow-md text-center h-full">
                    <svg class="w-10 h-10 text-purple-500 mb-3 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.257 3.099c-.763-1.36-2.74-.948-3.054.588-.35 1.726-.814 3.882-1.364 5.481C3.24 11.42 4.237 13 6 13c1.104 0 2-.896 2-2 0-.832-.5-1.544-1.215-1.848a20.53 20.53 0 0 1 1.472-5.053zM15.257 3.099c-.763-1.36-2.74-.948-3.054.588-.35 1.726-.814 3.882-1.364 5.481C10.24 11.42 11.237 13 13 13c1.104 0 2-.896 2-2 0-.832-.5-1.544-1.215-1.848a20.53 20.53 0 0 1 1.472-5.053z"/>
                    </svg>
                    <p class="text-gray-700 italic text-sm mb-3">"Kesuksesan bukan soal keberuntungan, tapi tentang konsistensi dan semangat."</p>
                    <span class="mt-2 text-xs text-gray-500 ">~ Tim Dashtern</span>
                </div>

                <!-- Quote 2 -->
                <div class="bg-gradient-to-r from-green-100 via-teal-100 to-blue-100 p-6 rounded-3xl shadow-md text-center h-full">
                    <svg class="w-10 h-9 text-teal-500 mb-3 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.257 3.099c-.763-1.36-2.74-.948-3.054.588-.35 1.726-.814 3.882-1.364 5.481C3.24 11.42 4.237 13 6 13c1.104 0 2-.896 2-2 0-.832-.5-1.544-1.215-1.848a20.53 20.53 0 0 1 1.472-5.053zM15.257 3.099c-.763-1.36-2.74-.948-3.054.588-.35 1.726-.814 3.882-1.364 5.481C10.24 11.42 11.237 13 13 13c1.104 0 2-.896 2-2 0-.832-.5-1.544-1.215-1.848a20.53 20.53 0 0 1 1.472-5.053z"/>
                    </svg>
                    <p class="text-gray-700 italic text-sm mb-3">"Belajar bukan tentang cepat, tapi tentang terus bergerak tanpa henti."</p>
                    <span class="mt-2 text-xs text-gray-500">~ Dashtern Team</span>
                </div>
            </div>

            <!-- Kontak & Lokasi (col-span-1) -->
            <div class="flex flex-col gap-4 col-span-1">
                <!-- Kontak -->
                <div class="bg-white p-6 rounded-3xl shadow-md">
                    <h2 class="text-lg font-semibold mb-2">Hubungi Kami</h2>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center gap-2">
                            <i class="fab fa-instagram text-pink-500"></i>
                            <a href="https://instagram.com/bpjsketenagakerjaan" target="_blank" class="hover:underline">Instagram</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fab fa-facebook text-blue-600"></i>
                            <a href="https://facebook.com/bpjsketenagakerjaan" target="_blank" class="hover:underline">Facebook</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-globe text-green-500"></i>
                            <a href="https://www.bpjsketenagakerjaan.go.id/" target="_blank" class="hover:underline">Website Resmi</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope text-yellow-500"></i>
                            <span>magang@bpjs.go.id</span>
                        </li>
                    </ul>
                </div>

                <!-- Lokasi -->
                <div class="bg-white px-4 py-4 rounded-3xl shadow-md">
                    <h2 class="text-lg font-semibold mb-3">Lokasi Magang</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=..."
                        width="100%" height="150" class="rounded-lg border-0 shadow-sm" loading="lazy" allowfullscreen>
                    </iframe>
                </div>
            </div>

        </div>


        </div>
    
@endsection
