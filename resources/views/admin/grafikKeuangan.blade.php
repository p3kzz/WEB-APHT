@extends('layouts.admin')
@php use Illuminate\Support\Str; @endphp
@php use Carbon\Carbon; @endphp

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Grafik Laporan Keuangan</h2>
            </h3>
            <canvas id="Chart" width="400" height="200"></canvas>
        </div>
        <a href="{{ route('admin_apht.datamonitoring.edit', $tenant->id) }}"
            class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Kembali ke Laporan</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produksi = @json($produksis);

            const labels = produksi.map(p => p.nama_produk);
            const pemasukanData = produksi.map(p => {
                const pemasukan = p.laporan_keuangan.find(lk => lk.keterangan === 'Pemasukan');
                return pemasukan ? pemasukan.jumlah : 0;
            });
            const pengeluaranData = produksi.map(p => {
                const pengeluaran = p.laporan_keuangan.find(lk => lk.keterangan === 'pengeluaran');
                return pengeluaran ? pengeluaran.jumlah : 0;
            });
            const labaRugiData = pemasukanData.map((pemasukan, index) => {
                return pemasukan - pengeluaranData[index];
            });

            const ctx = document.getElementById('Chart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pendapatan',
                        data: pemasukanData,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Pengeluaran',
                        data: pengeluaranData,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Laba/Rugi',
                        data: labaRugiData,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
