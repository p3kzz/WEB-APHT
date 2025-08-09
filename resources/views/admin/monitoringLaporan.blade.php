@extends('layouts.admin')
@php use Illuminate\Support\Str; @endphp
@php use Carbon\Carbon; @endphp

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Monitoring Laporan Tenant</h2>
        </h3>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="flex gap-4 mb-6">
            <a href="{{ route('admin_apht.datamonitoring.show', $tenant->id) }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-200">
                Lihat Grafik Keuangan
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 overflow-x-auto">
            @if ($produksis->isEmpty())
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative text-center">
                    <span class="block sm:inline">Belum ada data produksi yang tersedia.</span>
                </div>
            @else
                <table class="min-w-full divide-y divide-gray-200" id="monitoringTable">
                    <thead class="bg-gray-50 hidden md:table-header-group">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Produk</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Produksi</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah Stok</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pendapatan</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pengeluaran</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                                Laba</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deskripsi</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($produksis as $index => $item)
                            @php
                                $pemasukan = $item->laporanKeuangan->where('keterangan', 'Pemasukan')->first();
                                $pengeluaran = $item->laporanKeuangan->where('keterangan', 'pengeluaran')->first();
                                $labaRugi = $item->laporanKeuangan->where('keterangan', 'labarugi')->first();

                                $jumlahPemasukan = $pemasukan?->jumlah ?? 0;
                                $jumlahPengeluaran = $pengeluaran?->jumlah ?? 0;
                                $jumlahLabaRugi = $jumlahPemasukan - $jumlahPengeluaran;
                            @endphp
                            <tr
                                class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                                        class="md:hidden font-semibold text-gray-600">No : </span>{{ $loop->iteration }}.
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Tenant">
                                    <span class="md:hidden font-semibold text-gray-600">Nama :
                                    </span>{{ $tenant->user->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Produk">
                                    <span class="md:hidden font-semibold text-gray-600">Nama Produk :
                                    </span>{{ $item->nama_produk }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell"
                                    data-label="Tanggal Produksi"><span
                                        class="md:hidden font-semibold text-gray-600">Tanggal Produksi :
                                    </span>{{ Carbon::parse($item->tanggal_produksi)->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah Stok">
                                    <span class="md:hidden font-semibold text-gray-600">Jumlah Stok :
                                    </span>{{ number_format($item->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Pendapatan">
                                    <span class="md:hidden font-semibold text-gray-600">Pendapatan : </span>Rp
                                    {{ number_format($jumlahPemasukan, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Pengeluaran">
                                    <span class="md:hidden font-semibold text-gray-600">Pengeluaran : </span>Rp
                                    {{ number_format($jumlahPengeluaran, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Total Laba">
                                    <span class="md:hidden font-semibold text-gray-600">Total Laba : </span>Rp
                                    {{ number_format($jumlahLabaRugi, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Deskripsi"><span
                                        class="md:hidden font-semibold text-gray-600">Deskripsi :
                                    </span>{{ Str::limit($item->keterangan, 50, '...') }}</td>
                                <td class="px-6 py-4 text-sm block md:table-cell text-right md:text-left" data-label="Aksi">
                                    <span class="md:hidden font-semibold text-gray-600">Aksi: </span>
                                    <div class="inline-flex gap-2">
                                        -
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
