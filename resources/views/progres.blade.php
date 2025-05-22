@extends('layouts.app')

@section('title', 'Progres Kinerja')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Progres Kinerja</h1>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-bold mb-4">Grafik Progres Kinerja Kunjungan PU</h2>
        <div class="h-64">
            <canvas id="progressChart"></canvas>
        </div>
    </div>
    

    <div class="bg-white rounded-lg shadow p-6 mt-6">
    <h2 class="text-xl font-bold mb-4">Detail Progres Bulan ke-1</h2>

    <!-- Progres Bar Item -->
    <div class="space-y-4">
        <!-- Item 1 -->
        <div class="flex items-center gap-4">
            <span class="w-48">1. Akuisisi PU</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 100%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">1/1</p>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="flex items-center gap-4">
            <span class="w-48">2. Akuisisi BPU</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 60%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">3/5</p>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="flex items-center gap-4">
            <span class="w-48">3. Kunjungan PU</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 40%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">2/5</p>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="flex items-center gap-4">
            <span class="w-48">4. Kunjungan BPU</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 80%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">4/5</p>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="flex items-center gap-4">
            <span class="w-48">5. Laporan Bulanan</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 0%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">0/1</p>
            </div>
        </div>

        <!-- Item 6 -->
        <div class="flex items-center gap-4">
            <span class="w-48">6. Video Viralisasi</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 100%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">1/1</p>
            </div>
        </div>

        <!-- Item 7 -->
        <div class="flex items-center gap-4">
            <span class="w-48">7. Kehadiran</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 50%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">1/2</p>
            </div>
        </div>

        <!-- Item 8 -->
        <div class="flex items-center gap-4">
            <span class="w-48">8. Sosialisasi Kepling</span>
            <div class="flex-1">
                <div class="w-full h-6 bg-white border border-gray-300 rounded-full flex items-center">
                    <div class="h-full bg-green-900 rounded-full" style="width: 100%;"></div>
                </div>
                <p class="text-sm mt-1 text-right">1/1</p>
            </div>
        </div>
    </div>
</div>

  
</div>


@endsection

@push('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('progressChart').getContext('2d');
    const progressChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2025-05-18', '2025-05-19', '2025-05-20', '2025-05-21', '2025-05-22'],
            datasets: [{
                label: 'Progres',
                data: [4, 1, 2, 1, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 30,
                    title: {
                        display: true,
                        text: 'Jumlah Kunjungan'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                }
            }
        }
    });
</script>
@endpush
