@extends('layouts.app-admin')

@section('title', 'Detail Kelas')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Kelas › Nama Kelas</h1>

    @php
        $tab = request()->get('tab', 'pengumuman'); // default ke pengumuman
    @endphp

    {{-- Navigasi Tab --}}
    <div class="flex space-x-4 mb-6">
        <a href="?tab=pengumuman" class="{{ $tab == 'pengumuman' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Pengumuman
        </a>
        <a href="?tab=tugas" class="{{ $tab == 'tugas' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Tugas Kelas
        </a>
        <a href="?tab=orang" class="{{ $tab == 'orang' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Orang
        </a>
        <a href="?tab=dashboard" class="{{ $tab == 'dashboard' ? 'bg-[#163C3C] text-white' : 'bg-white text-black' }} px-4 py-2 rounded-md shadow">
            Dashboard
        </a>
    </div>

    <!-- Tombol Buat -->
    @if ($tab == 'pengumuman')
        <div class="flex justify-center mb-6">
            <button onclick="openModalPengumuman()" class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-2 rounded-xl shadow flex items-center space-x-2">
                <span>Buat</span>
                <div class="bg-white text-black rounded p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </button>
        </div>
    @elseif ($tab == 'tugas')
        <div class="flex justify-center mb-6">
            <button onclick="openModalTugas()" class="bg-[#163C3C] hover:bg-[#102d2d] text-white px-6 py-2 rounded-xl shadow flex items-center space-x-2">
                <span>Buat</span>
                <div class="bg-white text-black rounded p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

            <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="konten" class="block mb-2">Umumkan sesuatu pada kelas Anda</label>
                    <textarea name="konten" id="konten" rows="4" class="w-full p-3 rounded border border-gray-300"></textarea>
                </div>

                <div class="mb-4">
                    <label for="lampiran" class="block mb-2">Tambahkan lampiran</label>
                    <input type="file" name="lampiran" id="lampiran" class="w-full p-2 border rounded">
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="closeModal()" class="bg-white border border-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-[#163C3C] text-white px-4 py-2 rounded hover:bg-[#102d2d]">Buat</button>
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
            <h2 class="text-xl font-semibold mb-4">Pengumuman</h2>
            <p>Ini adalah konten pengumuman kelas.</p>

        @elseif ($tab == 'tugas')
            <h2 class="text-xl font-semibold mb-4">Tugas Kelas</h2>
            {{-- Konten Tugas Kelas --}}
            <div class="space-y-4">
    <div class="bg-white rounded-xl shadow flex items-center justify-between px-6 py-4 border border-gray-200">
        <div class="flex items-center space-x-4">
            <div class="bg-[#163C3C] text-white rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>

                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Judul Tugas</h3>
                        <p class="text-sm text-gray-500">Tanggal tugas diposting</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600"><strong>Tenggat:</strong> Tanggal tenggat tugas</p>
                </div>
            </div>
        </div>
        <p class="text-gray-700">           


    <!-- Modal Buat Tugas -->
    <div id="modalTugas" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-[#E8F0EF] w-full max-w-md mx-auto p-6 rounded-xl shadow-lg">
            <h2 class="text-xl font-bold text-center mb-4">Buat Tugas</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Judul Tugas --}}
                <div class="mb-4">
                    <label for="judul_tugas" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                    <input type="text" id="judul_tugas" name="judul_tugas" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required>
                </div>

                {{-- Deskripsi Tugas --}}
                <div class="mb-4">
                    <label for="deskripsi_tugas" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                    <textarea id="deskripsi_tugas" name="deskripsi_tugas" rows="4" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required></textarea>
                </div>

                {{-- Lampiran --}}
                <div class="mb-4">
                    <label for="lampiran" class="block text-sm font-medium text-gray-700 mb-1">Lampiran (Opsional)</label>
                    <input type="file" id="lampiran" name="lampiran" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]">
                </div>

                {{-- Tenggat --}}
                <div class="mb-6">
                    <label for="tenggat" class="block text-sm font-medium text-gray-700 mb-1">Tenggat tanggal & waktu</label>
                    <div class="flex space-x-2">
                        <input type="date" name="tanggal" class="w-1/2 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required>
                        <input type="time" name="waktu" value="23:59" class="w-1/2 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#163C3C]" required>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-between">
                    <button type="button" onclick="closeModalTugas()" class="bg-white border border-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-[#163C3C] text-white px-4 py-2 rounded hover:bg-[#102d2d]">Buat</button>
                </div>
            </form>
        </div>
    </div>

    @elseif ($tab == 'orang')
        <h2 class="text-xl font-semibold mb-4">Orang</h2>

        @php
            $daftarOrang = [
                ['nim' => '221401021', 'nama' => 'Reinata Carolina'],
                ['nim' => '221401022', 'nama' => 'Budi Hartono'],
                ['nim' => '221401023', 'nama' => 'Siti Nurhaliza'],
                ['nim' => '221401024', 'nama' => 'Fajar Setiawan'],
                ['nim' => '221401025', 'nama' => 'Indah Permata'],
                ['nim' => '221401026', 'nama' => 'Rizky Maulana'],
                ['nim' => '221401027', 'nama' => 'Galih Pramana'],
                ['nim' => '221401028', 'nama' => 'Nadia Sari'],
                ['nim' => '221401029', 'nama' => 'Andi Wijaya'],
                ['nim' => '221401030', 'nama' => 'Dewi Lestari'],
            ];
        @endphp

        <div class="overflow-auto rounded-lg border border-gray-200">
            <table class="min-w-full table-fixed text-sm text-left text-gray-700">
                <thead class="bg-gray-100 font-semibold text-gray-700">
                    <tr>
                        <th class="w-12 px-4 py-2 border">No</th>
                        <th class="w-40 px-4 py-2 border">NIM</th>
                        <th class="w-80 px-4 py-2 border">Nama</th>
                        <th class="w-40 px-4 py-2 border">Progress</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarOrang as $index => $orang)
                        <tr class="border-t">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $orang['nim'] }}</td>
                            <td class="px-4 py-2 border">{{ $orang['nama'] }}</td>
                            <td class="px-4 py-2 border">
                                <a href="#" class="text-blue-600 font-semibold hover:underline">Lihat Progress</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


       @elseif ($tab == 'dashboard')
    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>

    @php
        $mahasiswa = [
            ['nim' => '221401021', 'nama' => 'Reinata Carolina'],
            ['nim' => '221401022', 'nama' => 'Budi Hartono'],
            ['nim' => '221401023', 'nama' => 'Siti Nurhaliza'],
        ];
    @endphp

    @foreach ($mahasiswa as $index => $mhs)
        <div class="bg-white p-6 rounded-xl shadow mb-6">
            <div class="mb-4">
                <strong>{{ $index + 1 }}.</strong><br>
                <span>Nim : {{ $mhs['nim'] }}</span><br>
                <span>Nama : {{ $mhs['nama'] }}</span>
            </div>
            <canvas id="chart-{{ $index }}" height="200"></canvas>
        </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartConfigs = [
            {
                elementId: 'chart-0',
                data: {
                    labels: ['BPU', 'PU', 'Laporan', 'Video'],
                    datasets: [
                        { label: 'Bulan 1', data: [3, 1, 4, 1], backgroundColor: 'rgba(54, 162, 235, 0.6)' },
                        { label: 'Bulan 2', data: [7, 0, 5, 2], backgroundColor: 'rgba(255, 99, 132, 0.6)' },
                        { label: 'Bulan 3', data: [7, 1, 3, 2], backgroundColor: 'rgba(75, 192, 192, 0.6)' },
                    ]
                }
            },
            {
                elementId: 'chart-1',
                data: {
                    labels: ['BPU', 'PU', 'Laporan', 'Video'],
                    datasets: [
                        { label: 'Bulan 1', data: [4, 1, 3, 1], backgroundColor: 'rgba(54, 162, 235, 0.6)' },
                        { label: 'Bulan 2', data: [7, 0, 4, 1], backgroundColor: 'rgba(255, 99, 132, 0.6)' },
                        { label: 'Bulan 3', data: [6, 1, 2, 2], backgroundColor: 'rgba(75, 192, 192, 0.6)' },
                    ]
                }
            },
            {
                elementId: 'chart-2',
                data: {
                    labels: ['BPU', 'PU', 'Laporan', 'Video'],
                    datasets: [
                        { label: 'Bulan 1', data: [2, 1, 4, 1], backgroundColor: 'rgba(54, 162, 235, 0.6)' },
                        { label: 'Bulan 2', data: [6, 0, 5, 2], backgroundColor: 'rgba(255, 99, 132, 0.6)' },
                        { label: 'Bulan 3', data: [5, 1, 3, 1], backgroundColor: 'rgba(75, 192, 192, 0.6)' },
                    ]
                }
            }
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
                            ticks: { stepSize: 1 }
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