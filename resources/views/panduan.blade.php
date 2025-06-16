@extends('layouts.app')

@section('title', 'Panduan')

@section('content')
    <div class="max-w-7xl mx-auto space-y-6 font-sans px-4 pt-2 font-sans">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">🗂️ Panduan</h1>
                <p class="text-gray-500 text-sm mt-1">Panduan untuk melihat informasi mengenai program magang.</p>
            </div>
            <div class="flex items-center space-x-2 text-gray-600 mt-4 md:mt-0">
                <i class="fas fa-calendar-alt"></i>
                <span class="text-sm font-medium">{{ \Carbon\Carbon::now()->format('j F, Y') }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 mt-6">
            @forelse ($panduans as $panduan)
                    <!-- Notifikasi Panduan Baru -->
                    <div class="bg-gradient-to-r from-blue-100 to-blue-50 rounded-xl px-4 flex flex-col sm:flex-row items-center shadow-md mb-2">

                        <!-- Gambar Ilustrasi -->
                        <div class="w-full pl-2 sm:basis-1/6 flex justify-center sm:justify-start mb-2 sm:mb-0">
                            <img src="{{ asset('image/panduan-icon.svg') }}" alt="Panduan Ilustrasi"
                                class="w-32 drop-shadow-md transition duration-300 hover:scale-105">
                        </div>

                        <!-- Teks Notifikasi -->
                        <div class="w-full sm:basis-5/6 sm:pl-4 text-center sm:text-left">
                            <h2 class="text-lg font-semibold text-blue-600 flex items-center justify-center sm:justify-start gap-2">
                                Kamu punya {{ $panduans->count() }} panduan baru yang siap dibaca!
                            </h2>
                            <p class="text-sm sm:text-base text-blue-500 mt-1">
                                Yuk cek dan pelajari informasi penting seputar program magangmu.
                                Jangan sampai ketinggalan ya! 🚀
                            </p>
                        </div>
                    </div>

                    <a href="{{ $panduan->link_drive }}" target="_blank"
                        class="relative block bg-white rounded-2xl shadow-md overflow-hidden group border-l-4 border-sky-700">

                        <!-- Konten utama -->
                        <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 md:gap-4 p-5">
                            <!-- Kiri: Icon + Info -->
                            <div class="flex items-center gap-4">
                                <!-- Icon Panduan -->
                                <div class="bg-sky-50 text-sky-700 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 384 512">
                                        <path
                                            d="M64 464c-8.8 0-16-7.2-16-16L48 64c0-8.8 7.2-16 16-16l160 0 0 80c0 17.7 14.3 32 32 32l80 0 0 288c0 8.8-7.2 16-16 16L64 464zM64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-293.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0L64 0zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24l144 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-144 0zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24l144 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-144 0z" />
                                    </svg>
                                </div>

                                <!-- Info Panduan -->
                                <div class="flex flex-col">
                                    <h2 class="text-lg font-semibold text-sky-700 group-hover:text-sky-700">
                                        {{ $panduan->judul }}
                                    </h2>
                                    <p class="text-xs text-gray-400 mt-0.5">
                                        Diterbitkan {{ $panduan->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>

                            <!-- Kanan: Lihat Detail -->
                            <div class="text-sm text-sky-700 font-semibold hover:font-bold sm:self-center sm:text-right">
                                Lihat Detail →
                            </div>
                        </div>
                    </a>

                @empty
                    <div class="flex flex-col items-center justify-center py-20 text-center text-gray-500">
                        <img src="{{ asset('image/panduan-kosong.svg') }}" alt="No Data" class="w-52 mb-6">
                        <p class="text-lg font-semibold">Belum ada panduan yang tersedia</p>
                        <p class="text-sm text-gray-400">Silakan cek kembali nanti atau hubungi admin</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
