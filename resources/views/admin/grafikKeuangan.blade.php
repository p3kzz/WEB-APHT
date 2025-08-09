@extends('layouts.admin')
@php use Illuminate\Support\Str; @endphp
@php use Carbon\Carbon; @endphp

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Grafik Laporan Keuangan </h2>
            <canvas id="Chart" width="400" height="200"></canvas>
        </div>
        <a href="{{ route('admin_apht.datamonitoring.edit', $tenant->id) }}"
            class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Kembali ke Laporan</a>
    </div>

    <!-- CDN Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produksis = @json($produksis ?? []);

            produksis.sort((a, b) => {
                if (a.tanggal_produksi === b.tanggal_produksi) {
                    return a.nama_produk.localeCompare(b.nama_produk);
                }
                return new Date(a.tanggal_produksi) - new Date(b.tanggal_produksi);
            });

            console.log("Data produksi dari server:", produksis);

            const labels = produksis.map(p => p.nama_produk);

            const pemasukanData = produksis.map(p => {
                const item = p.laporan_keuangan.find(lk => lk.keterangan === 'Pemasukan');
                return item ? item.jumlah : 0;
            });
            const pengeluaranData = produksis.map(p => {
                const item = p.laporan_keuangan.find(lk => lk.keterangan === 'pengeluaran');
                return item ? item.jumlah : 0;
            });
            const labaRugiData = produksis.map(p => {
                const pemasukan = p.laporan_keuangan.find(lk => lk.keterangan === 'Pemasukan');
                const pengeluaran = p.laporan_keuangan.find(lk => lk.keteruangan === 'pengeluaran');
                return (pemasukan ? pemasukan.jumlah : 0) - (pengeluaran ? pengeluaran.jumlah : 0);
            });

            const colors = {
                pemasukan: '#80d8df',
                pengeluaran: '#ff6666',
                labaRugi: '#4db6ac'
            };

            const ctx = document.getElementById('Chart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pendapatan',
                        data: pemasukanData,
                        backgroundColor: colors.pemasukan,
                        borderColor: colors.pemasukan,
                        borderWidth: 1
                    }, {
                        label: 'Pengeluaran',
                        data: pengeluaranData,
                        backgroundColor: colors.pengeluaran,
                        borderColor: colors.pengeluaran,
                        borderWidth: 1
                    }, {
                        label: 'Laba/Rugi',
                        data: labaRugiData,
                        backgroundColor: colors.labaRugi,
                        borderColor: colors.labaRugi,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            type: 'category',
                            stacked: false,
                            grid: {
                                display: true,
                                drawOnChartArea: true,
                                color: function(context) {
                                    const index = context.index;
                                    const currentTanggal = produksis[index] ? produksis[index]
                                        .tanggal_produksi : null;
                                    const prevTanggal = index > 0 && produksis[index - 1] ? produksis[
                                        index - 1].tanggal_produksi : null;

                                    if (currentTanggal && currentTanggal !== prevTanggal) {
                                        return 'rgba(200, 200, 200, 0.4)';
                                    } else {
                                        return 'transparent';
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'Tanggal Produksi & Produk'
                            },
                            ticks: {
                                callback: function(val, index) {
                                    const currentProduksi = produksis[index];
                                    if (!currentProduksi) return this.getLabelForValue(val);

                                    const currentTanggal = currentProduksi.tanggal_produksi;
                                    const prevTanggal = index > 0 ? produksis[index - 1]
                                        .tanggal_produksi : null;
                                    const nextTanggal = index < produksis.length - 1 ? produksis[index +
                                        1].tanggal_produksi : null;
                                    const currentProduk = this.getLabelForValue(val);

                                    const laporanDitanggalSama = produksis.filter(p => p
                                        .tanggal_produksi === currentTanggal).length;

                                    const startIndex = produksis.findIndex(p => p.tanggal_produksi ===
                                        currentTanggal);
                                    const middleIndex = startIndex + Math.floor(laporanDitanggalSama /
                                        2);

                                    if (index === middleIndex && laporanDitanggalSama > 1) {
                                        const formattedDate = new Date(currentTanggal)
                                            .toLocaleDateString('id-ID', {
                                                day: 'numeric',
                                                month: 'short'
                                            });
                                        return [`${formattedDate}`, `${currentProduk}`];
                                    } else if (laporanDitanggalSama === 1) {
                                        const formattedDate = new Date(currentTanggal)
                                            .toLocaleDateString('id-ID', {
                                                day: 'numeric',
                                                month: 'short'
                                            });
                                        return [`${formattedDate}`, `${currentProduk}`];
                                    } else {
                                        return currentProduk;
                                    }
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah (Rp)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return 'Rp' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                generateLabels: (chart) => {
                                    const labels = [];
                                    const datasetLabels = new Set();
                                    chart.data.datasets.forEach(dataset => {
                                        if (!datasetLabels.has(dataset.label)) {
                                            datasetLabels.add(dataset.label);
                                            labels.push({
                                                text: dataset.label,
                                                fillStyle: dataset.backgroundColor,
                                                strokeStyle: dataset.borderColor,
                                                lineWidth: dataset.borderWidth,
                                                pointStyle: 'rect',
                                            });
                                        }
                                    });
                                    return labels;
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                title: (tooltipItems) => {
                                    const index = tooltipItems[0].dataIndex;
                                    const produk = produksis[index].nama_produk;
                                    const tanggal = new Date(produksis[index].tanggal_produksi);
                                    const formattedDate = tanggal.toLocaleDateString('id-ID', {
                                        day: 'numeric',
                                        month: 'long',
                                        year: 'numeric'
                                    });
                                    return `${produk} (${formattedDate})`;
                                },
                                label: (context) => {
                                    const label = context.dataset.label || '';
                                    const value = context.parsed.y;
                                    return `${label}: Rp${value.toLocaleString('id-ID')}`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
