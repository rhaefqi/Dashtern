 @extends('layouts.app')

 @section('title', 'Beranda')

 @section('content')
     <h1 class="text-2xl font-bold text-gray-800 mb-6">Selamat datang di Dashtern</h1>
     <main class="flex-1 p-10">
         <div class="bg-white p-6 rounded-xl shadow max-w-3xl">
             <h2 class="text-xl font-bold mb-2">Pengumuman</h2>
             <p class="text-gray-700">
                 Dalam rangka menjaga keamanan dan kerahasiaan data pengguna, kami mengimbau kepada seluruh pengguna
                 untuk
                 <strong class="font-semibold">segera melakukan penggantian password akun</strong>. Langkah ini
                 bertujuan untuk mencegah potensi akses yang tidak sah serta memastikan bahwa akun Anda tetap
                 terlindungi dengan baik.
             </p>
         </div>
     </main>

 @endsection
