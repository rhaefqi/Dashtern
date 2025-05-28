@extends('layouts.app-admin')

@section('title', 'Tentang Dashtern')

@section('content')
    <style>
        .social-icons a {
            display: inline-block;
            margin: 0 5px;
            width: 24px;
            height: 24px;
        }
        .social-icons img {
            width: 100%;
            height: auto;
            filter: grayscale(100%);
            transition: filter 0.3s ease-in-out;
        }
        .social-icons img:hover {
            filter: none;
        }

        .swiper-button-prev,
        .swiper-button-next {
            background-color: white;
            border-radius: 9999px;
            width: 40px;
            height: 40px;
            top: 50%;
            transform: translateY(-50%);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            color: #1f2937;
        }

        .swiper-button-prev::after,
        .swiper-button-next::after {
            display: none;
        }

        .swiper-pagination {
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .custom-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            border-radius: 9999px;
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            z-index: 10;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .custom-nav:hover {
            background-color: #f3f4f6;
        }
    </style>

    <div class="py-2 px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800">Tentang Kami</h1>
    </div>

    <div class="bg-white rounded-xl shadow-md max-w-5xl mx-auto mt-10 p-6">
        <p class="text-justify text-gray-700 mb-6 text-base leading-relaxed">
            Dashtern adalah sebuah platform web yang dikembangkan oleh mahasiswa magang BPJS Ketenagakerjaan tahun 2025 
            sebagai inovasi untuk mendukung proses monitoring dan evaluasi kegiatan magang. Aplikasi ini dirancang 
            untuk mempermudah pencatatan progres harian, pengumpulan laporan, serta penilaian kinerja peserta magang 
            secara digital dan transparan. Dengan antarmuka yang intuitif dan sistem poin yang terintegrasi, Dashtern 
            menjadi solusi efektif dalam meningkatkan produktivitas, akuntabilitas, dan kolaborasi antara peserta magang 
            dan pembimbing di lingkungan BPJS Ketenagakerjaan.
        </p>

        <div class="py-2 px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800">Our Team</h1>
    </div>

        @php
            $profiles = [
                ['name' => 'Dewi Ragil', 'email' => 'dewiragil1405@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/dewi-ragil-ba878128b/', 'instagram' => 'de_ragil', 'image' => 'ragil.png'],
                ['name' => 'Megaputri Panjaitan', 'email' => 'megaputripanjaitan@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/megaputri-panjaitan', 'instagram' => 'megaputriipjn', 'image' => 'mega.png'],
                ['name' => 'Syifa Khairunisa', 'email' => 'syifakhairunisa2384@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/syifaa-khairunisa', 'instagram' => 'syifa_khairunisa06', 'image' => 'cipa.png'],
                ['name' => 'Reinata Carolina', 'email' => 'reinatacarolinaa12@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/reinata-carolina', 'instagram' => 'carolina.reinata', 'image' => 'reinata.png'],
                ['name' => 'Fadillah Emilia', 'email' => 'fadhillahemilia25@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/fadillahemilianst', 'instagram' => 'fadhillahemilianst', 'image' => 'dila.png'],
                ['name' => 'Ruth Grace', 'email' => 'ruthgracearlyanamanurung@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/ruthgracea', 'instagram' => 'ruthgracea_', 'image' => 'ruth.png'],
                ['name' => 'Rifqi Jabrah', 'email' => 'rifqijabrah@gmail.com', 'linkedin' => 'https://www.linkedin.com/in/rifqi-jabrah', 'instagram' => 'rifqijabrah', 'image' => 'rifki.png'],
            ];
        @endphp

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <div class="swiper my-12 px-10 md:px-20 relative">

            <div class="swiper-wrapper">
                @foreach ($profiles as $profile)
                    <div class="swiper-slide flex justify-center items-start min-h-[380px] mb-6">
                        <div class="bg-white rounded-xl shadow-xl w-64 pb-2">
                            <div class="bg-white border-[12px] border-white rounded-md shadow-md overflow-hidden">
                                <img src="{{ asset('image/' . $profile['image']) }}"
                                     alt="{{ $profile['name'] }}"
                                     class="w-full h-64 object-cover transition-transform duration-300 hover:scale-105" />
                            </div>
                            <div class="mt-3 text-center">
                                <h3 class="font-bold text-gray-800">{{ $profile['name'] }}</h3>
                                <div class="social-icons mt-3 mb-4 flex justify-center gap-4">
                                    <a href="mailto:{{ $profile['email'] }}" target="_blank">
                                        <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email">
                                    </a>
                                    <a href="{{ $profile['linkedin'] }}" target="_blank">
                                        <img src="https://cdn-icons-png.flaticon.com/512/145/145807.png" alt="LinkedIn">
                                    </a>
                                    <a href="https://instagram.com/{{ $profile['instagram'] }}" target="_blank">
                                        <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination DITARUH DI SINI -->
            <div class="swiper-pagination mt-6"></div>

            <div class="swiper-button-prev custom-nav -left-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div>
            <div class="swiper-button-next custom-nav -right-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                }
            });
        </script>

    </div>
@endsection