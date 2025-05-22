@extends('layouts.app')

@section('title', 'Panduan')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Panduan</h1>

    <div class="grid grid-cols-1 gap-4 mt-6">
        <a href="https://drive.google.com/file/d/1yPvcVZFA9_eYbMcqJw2a4px__L8ELD06/view?usp=drive_link" class="block bg-white rounded-xl shadow p-4 hover:bg-gray-100 transition flex justify-between items-center">
            <h2 class="text-xl font-bold">Alur Pendaftaran PU</h2>
            <span class="text-blue-600 hover:underline font-medium">Detail</span>
        </a>

        <a href="https://drive.google.com/file/d/1sgmLt9twcd9j0JxsOwhGFpdA3Zng6Ks8/view?usp=drive_link" class="block bg-white rounded-xl shadow p-4 hover:bg-gray-100 transition flex justify-between items-center">
            <h2 class="text-xl font-bold">Alur Pendaftaran BPU</h2>
            <span class="text-blue-600 hover:underline font-medium">Detail</span>
        </a>

        <!-- Tambahkan box kelas lain di sini -->
    </div>
@endsection
