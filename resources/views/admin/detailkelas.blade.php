@extends('layouts.app-admin')

@section('title', 'Detail Kelas')

@section('content')
    <h1 class="text-2xl font-semibold mb-4"><a href="{{ route('admin.kelas.index') }}">Kelas </a> › {{ $kelas->nama }}</h1>

    @php
        $tab = request()->get('tab', 'pengumuman'); // default ke pengumuman
    @endphp

    {{-- Navigasi Tab --}}
    <div class="flex space-x-4 mb-6">
        <a href="?tab=pengumuman"
            class="{{ $tab == 'pengumuman' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Pengumuman
        </a>
        <a href="?tab=tugas"
            class="{{ $tab == 'tugas' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Tugas Kelas
        </a>
        <a href="?tab=orang"
            class="{{ $tab == 'orang' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Orang
        </a>
        <a href="?tab=dashboard"
            class="{{ $tab == 'dashboard' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Dashboard
        </a>
    </div>

    <!-- Tombol Buat -->
    @if ($tab == 'pengumuman')
        <div class="flex justify-center mb-6">
            <button onclick="openModalPengumuman()"
                class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-2 rounded-xl shadow flex items-center space-x-2">
                <span>Buat</span>
                <div class="bg-white text-black rounded p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </button>
        </div>
    @elseif ($tab == 'tugas')
        <div class="flex justify-center mb-6">
            <button onclick="openModalTugas()"
                class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-2 rounded-xl shadow flex items-center space-x-2">
                <span>Buat</span>
                <div class="bg-white text-black rounded p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </button>
        </div>
    @endif

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-[#E8F0EF] w-full max-w-md mx-auto p-6 rounded-xl shadow-lg">
            <h2 class="text-xl font-bold text-center mb-4">Buat Pengumuman</h2>

            <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block mb-2">Judul Pengumuman</label>
                    <input type="text" name="judul" id="judul" rows="4"
                        class="w-full p-3 rounded border border-gray-300">
                    <input type="hidden" name="kode_kelas" id="kode_kelas" value="{{ $kelas->kode_kelas }}" rows="4"
                        class="w-full p-3 rounded border border-gray-300">
                </div>

                <div class="mb-4">
                    <label for="isi" class="block mb-2">Isi pengumuman</label>
                    <textarea name="isi" id="isi" rows="4" class="w-full p-3 rounded border border-gray-300"></textarea>
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="closeModal()"
                        class="bg-white border border-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit"
                        class="bg-[#163C3C] text-white px-4 py-2 rounded hover:bg-[#102d2d]">Buat</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('modal').classList.remove('flex');
        }
    </script>
    <script>
        function openModalPengumuman() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('modal').classList.remove('flex');
        }

        function openModalTugas() {
            document.getElementById('modalTugas').classList.remove('hidden');
            document.getElementById('modalTugas').classList.add('flex');
        }

        function closeModalTugas() {
            document.getElementById('modalTugas').classList.add('hidden');
            document.getElementById('modalTugas').classList.remove('flex');
        }
    </script>


    {{-- Konten Berdasarkan Tab --}}
    <div class="bg-white rounded-xl shadow p-6">
        @if ($tab == 'pengumuman')
            <h2 class="text-2xl font-semibold ">Kode Kelas > {{ $kelas['kode_kelas'] }}</h2>
            @foreach ($pengumuman as $p)
                <div class= "flex justify-between">
                    <div>
                        <h2 class="text-xl font-semibold mt-4">{{ $p->judul }}</h2>
                        <p class="mb-4">{{ $p->isi }}</p>
                    </div>
                    <div class="flex items-center">
                        <form id="form-delete-{{ $p->id }}" action="{{ route('admin.pengumuman.delete', $p->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePengumuman('{{ $p->id }}')"
                                style="border:none; background:none; !important" class="text-red-500">
                                <i class="fa-solid fa-trash icon-delete"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <hr class="border-gray-900">
            @endforeach
        @elseif ($tab == 'tugas')
            <h2 class="text-xl font-semibold mb-4">Tugas Kelas</h2>
            {{-- Konten Tugas Kelas --}}
            <div class="space-y-4">
                @foreach ($tugas as $t)
                    <div
                        class="bg-white rounded-xl shadow flex items-center justify-between px-6 py-4 border border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="bg-[#163C3C] text-white rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>

                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">{{ $t->nama }}</h3>
                                <p class="text-sm text-gray-500">{{ $t->created_at }}</p>
                            </div>
                        </div>
                        <div class="text-right flex">
                            <p class="text-sm text-gray-600 mr-7"><strong>Tenggat:</strong> {{ $t->tenggat }}</p>
                            <form id="form-delete-{{ $t->id }}"
                                action="{{ route('admin.tugas.delete', $t->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteTugas('{{ $t->id }}')"
                                    style="border:none; background:none; !important" class="text-red-500">
                                    <i class="fa-solid fa-trash icon-delete"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-gray-700">


                <!-- Modal Buat Tugas -->
            <div id="modalTugas" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                <div class="bg-[#E8F0EF] w-full max-w-md mx-auto p-6 rounded-xl shadow-lg">
                    <h2 class="text-xl font-bold text-center mb-4">Buat Tugas</h2>

                    <form action="{{ route('admin.tugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Judul Tugas --}}
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Judul
                                Tugas</label>
                            <input type="text" id="nama" name="nama"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]"
                                required>
                            <input type="hidden" name="kode_kelas" value="{{ $kelas->kode_kelas }}">
                        </div>

                        {{-- Deskripsi Tugas --}}
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                                Tugas</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Jenis Tugas</label>
                            <select name="status" id="status"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]">
                                <option value="akuisisi_pu">akuisisi pu</option>
                                <option value="akuisisi_bpu">akuisisi bpu</option>
                                <option value="kunjungan_pu">kunjungan pu</option>
                                <option value="kunjungan_bpu">kunjungan bpu</option>
                                <option value="sosialisasi">sosialisasi</option>
                                <option value="video">video</option>
                                <option value="absensi">absensi</option>
                                <option value="laporan">laporan</option>
                            </select>
                        </div>

                        {{-- Tenggat --}}
                        <div class="mb-6">
                            <label for="tenggat" class="block text-sm font-medium text-gray-700 mb-1">Tenggat
                                tanggal</label>
                            <div class="flex space-x-2">
                                <input type="date" name="tenggat"
                                    class="w-1/2 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]"
                                    required>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="flex justify-between">
                            <button type="button" onclick="closeModalTugas()"
                                class="bg-white border border-gray-300 px-4 py-2 rounded">Batal</button>
                            <button type="submit"
                                class="bg-[#163C3C] text-white px-4 py-2 rounded hover:bg-[#102d2d]">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        @elseif ($tab == 'orang')
            <h2 class="text-xl font-semibold mb-4">Daftar Mahasiswa</h2>

            <div class="overflow-auto rounded-lg border border-gray-200">
                <table class="min-w-full table-fixed text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 font-semibold text-gray-700">
                        <tr>
                            <th class="w-12 px-4 py-2 border">No</th>
                            <th class="w-40 px-4 py-2 border">NIM</th>
                            <th class="w-80 px-4 py-2 border">Nama</th>
                            <th class="w-40 px-4 py-2 border text-center">Nilai Saat Ini</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $index => $m)
                            <tr class="border-t">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $m->nim }}</td>
                                <td class="px-4 py-2 border">{{ $m->nama }}</td>
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
        @elseif ($tab == 'dashboard')
            <h2 class="text-xl font-semibold mb-4">Dashboard</h2>

            @foreach ($mahasiswa as $index => $m)
                <div class="bg-white p-6 rounded-xl shadow mb-6">
                    <div class="mb-4">
                        <strong>{{ $index + 1 }}.</strong><br>
                        <span>NIM : {{ $m->nim }}</span><br>
                        <span>Nama : {{ $m->nama }}</span>
                    </div>
                    <canvas id="chart-{{ $index }}" height="200"></canvas>
                </div>
            @endforeach

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const chartConfigs = [
                    @foreach ($mahasiswa as $index => $m)
                        {
                            elementId: "chart-{{ $index }}",
                            data: {
                                labels: ['BPU', 'PU', 'Laporan', 'Video'],
                                datasets: [{
                                        label: 'Bulan 1',
                                        data: {!! json_encode($dataNilai[$m->nim]['bulan1'] ?? [5, 2, 1, 1]) !!},
                                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                                    },
                                    {
                                        label: 'Bulan 2',
                                        data: {!! json_encode($dataNilai[$m->nim]['bulan2'] ?? [7, 2, 1, 0]) !!},
                                        backgroundColor: 'rgba(255, 99, 132, 0.6)'
                                    },
                                    {
                                        label: 'Bulan 3',
                                        data: {!! json_encode($dataNilai[$m->nim]['bulan3'] ?? [10, 1, 1, 1]) !!},
                                        backgroundColor: 'rgba(75, 192, 192, 0.6)'
                                    },
                                ]
                            }
                        },
                    @endforeach
                ];

                chartConfigs.forEach(config => {
                    const ctx = document.getElementById(config.elementId).getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: config.data,
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
        @else
            <p>Tab tidak dikenali.</p>
        @endif
    </div>
@endsection
