@extends('layouts.app')

@section('title', 'Profil')

@section('content')

<?php
$nama = "Reinata Carolina";
$nim = "221401021";
$prodi = "Ilmu Komputer";
$fakultas = "Ilmu Komputer dan Teknologi Informasi"
?>
<h1 class="text-2xl font-semibold mb-4">Profil</h1>
<div class="max-w-4xl mx-auto py-10 px-4">

    
    <div class="bg-white rounded-xl shadow-md p-6 flex items-center justify-between">
      <div class="flex items-center space-x-4">
        <div class="bg-gray-200 p-4 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.962 11.962 0 0112 15c2.042 0 3.952.488 5.635 1.349M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <div class="text-gray-700 text-sm">
          <p class="ml-2"><span class="font-semibold">Nama</span> : <?= $nama ?></p>
          <p class="mt-2 ml-2"><span class="font-semibold">NIM</span> : <?= $nim ?></p>
          <p class="mt-2 ml-2"><span class="font-semibold">Prodi</span> : <?= $prodi ?> </p>
          <p class="mt-2 ml-2"><span class="font-semibold">Fakultas</span> : <?= $fakultas ?> </p>
        </div>
      </div>
      
        <a href="{{ route('ganti-password') }}" class="bg-[#00332f] text-white text-sm text-center px-4 py-2 rounded-3xl mr-10 h-10 hover:bg-[#005046] transition">
        Ganti Kata Sandi
        </a>
    </div>
    </div>

    @if(session('success'))
  <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
    {{ session('success') }}
  </div>
    @endif


  </div>
@endsection