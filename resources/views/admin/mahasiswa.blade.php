@extends('layouts.app-admin')

@section('title', 'admin|mahasiswa')

@section('content')

    <div class="mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6">Daftar Mahasiswa</h1>
        <div class="flex justify-between mb-4 gap-4 items-center">
            <div class="flex-1">
                <form action="{{ route('admin.mahasiswa.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="flex input-group">
                        <input
                            class="block text-sm text-gray-900 border border-gray-300 rounded-l-lg cursor-pointer bg-gray-50
                    focus:outline-none file:mr-4 file:py-3 file:px-4 file:rounded-l-md file:border-0
                    file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100"
                            id="file_input" type="file" name="excel_mahasiswa">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5">Import</button>
                    </div>
                </form>
            </div>
            <div class="flex-1">
                <form action="{{ route('admin.mahasiswa') }}" method="GET" class="w-full"> 
                  {{-- @csrf --}}
                  {{-- @method('GET') --}}
                  <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search Mockups, Logos..." />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="overflow-auto rounded-lg border border-gray-200">
            <table class="min-w-full table-fixed text-sm text-left text-gray-700">
                <thead class="bg-gray-100 font-semibold text-gray-700">
                    <tr>
                        <th class="w-12 px-4 py-2 border">No</th>
                        <th class="w-40 px-4 py-2 border">NIM</th>
                        <th class="w-80 px-4 py-2 border">Nama</th>
                        <th class="w-80 px-4 py-2 border">Universitas</th>
                        <th class="w-80 px-4 py-2 border">Prodi</th>
                        <th class="w-40 px-4 py-2 border text-center">Nilai Saat Ini</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $index => $m)
                        <tr class="border-t">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $m->nim }}</td>
                            <td class="px-4 py-2 border">{{ $m->nama }}</td>
                            <td class="px-4 py-2 border">{{ $m->universitas }}</td>
                            <td class="px-4 py-2 border">{{ $m->prodi }}</td>
                            <td class="px-4 py-2 border text-center text-l font-semibold">
                                @if ($m->total_nilai >= 80)
                                    <p class="text-green-600">{{ $m->total_nilai }} (A)</p>
                                @elseif ($m->total_nilai >= 70)
                                    <p class="text-yellow-600">{{ $m->total_nilai }} (B)</p>
                                @elseif ($m->total_nilai >= 60)
                                    <p class="text-orange-600">{{ $m->total_nilai }} (B)</p>
                                @else
                                    <p class="text-red-600">{{ $m->total_nilai }} (D)</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
