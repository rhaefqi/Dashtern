@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-semibold mb-6">Profil</h1>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="bg-gray-200 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.962 11.962 0 0112 15c2.042 0 3.952.488 5.635 1.349M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="text-gray-700 text-sm">
                    <p class="ml-2"><span class="font-semibold">Nama</span> : {{ $mahasiswa->nama }}</p>
                    <p class="mt-2 ml-2"><span class="font-semibold">NIM</span> : {{ $mahasiswa->nim }}</p>
                    <p class="mt-2 ml-2"><span class="font-semibold">Prodi</span> : {{ $mahasiswa->prodi }}</p>
                    <p class="mt-2 ml-2"><span class="font-semibold">Fakultas</span> : {{ $mahasiswa->fakultas }}</p>
                </div>
            </div>

            <a href="{{ route('profil.ganti-password.update') }}" class="bg-[#00332f] text-white text-sm text-center px-4 py-2 rounded-3xl mr-10 h-10 hover:bg-[#005046] transition">
                Ganti Kata Sandi
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
@endsection
