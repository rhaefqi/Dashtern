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
            class="px-6 py-2 mt-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
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
                        <button type="button" 
                            onclick="confirmDelete('{{ $panduan->id }}')" 
                            class="text-red-600 hover:underline text-sm">
                            Hapus
                        </button>

                        <form id="delete-form-{{ $panduan->id }}" 
                            action="{{ url('/admin/panduan/' . $panduan->id) }}" 
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif


    @if(session('success'))
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        timer: 3000,
        showConfirmButton: false
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session('error') }}',
        timer: 3000,
        showConfirmButton: false
        });
    </script>
    @endif

    @if($errors->any())
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        });
    </script>
    @endif

</div>
@endsection
