@extends('layouts.app-admin')

@section('title', 'admin|panduan')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6">Panduan Admin</h1>

    <form action="{{ url('/admin/panduan') }}" method="POST">
        @csrf

        <div>
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Panduan</label>
            <input type="text" name="judul" id="judul" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label for="link_drive" class="block text-sm font-medium text-gray-700 mb-1">Link Google Drive</label>
            <input type="url" name="link_drive" id="link_drive" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <button type="submit"
            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
            Simpan Panduan
        </button>
    </form>

            <hr class="my-8">

        <h2 class="text-2xl font-semibold mb-4">Daftar Panduan</h2>

        @if($panduans->isEmpty())
            <p class="text-gray-500">Belum ada panduan yang diunggah.</p>
        @else
            <ul class="space-y-3">
                @foreach($panduans as $panduan)
                    <li class="p-4 bg-gray-50 rounded-md shadow flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold">{{ $panduan->judul }}</h3>
                            <a href="{{ $panduan->link_drive }}" target="_blank" class="text-blue-600 hover:underline text-sm">Lihat File</a>
                        </div>
                        <form action="{{ url('/admin/panduan/' . $panduan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus panduan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif


    @if(session('success'))
        <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mt-6 p-4 bg-red-100 text-red-700 rounded-md">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
