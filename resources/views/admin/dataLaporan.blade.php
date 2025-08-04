@extends('layouts.admin')

@section('content')
    <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
        <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>

    </div>

    <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors duration-200"
            onclick="showTab('produksi')">Laporan Produksi</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full hover:bg-gray-300 transition-colors duration-200"
            onclick="showTab('keuangan')">Laporan Keuangan</button>
    </div>

    <div id="produksiTab" class="tab-content bg-white rounded-lg shadow-md p-4 overflow-x-auto">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Laporan Produksi</h3>
        @if ($laporanProduksi->isEmpty())
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative text-center">
                <span class="block sm:inline">Belum ada data laporan produksi.</span>
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200" id="produksiTable">
                <thead class="bg-gray-50 hidden md:table-header-group">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Produk</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biaya
                            Produksi</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Produksi</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jumlah</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($laporanProduksi as $index => $data)
                        <tr
                            class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                                    class="md:hidden font-semibold text-gray-600">No: </span>{{ $index + 1 }}.</td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Produk">
                                <span class="md:hidden font-semibold text-gray-600">Nama Produk:
                                </span>{{ $data->nama_produk }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Biaya Produksi">
                                <span class="md:hidden font-semibold text-gray-600">Biaya Produksi: </span>Rp.
                                {{ number_format($data->biaya_produksi, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal Produksi">
                                <span class="md:hidden font-semibold text-gray-600">Tanggal Produksi:
                                </span>{{ \Carbon\Carbon::parse($data->tanggal_produksi)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah"><span
                                    class="md:hidden font-semibold text-gray-600">Jumlah:
                                </span>{{ number_format($data->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div id="keuanganTab" class="tab-content bg-white rounded-lg shadow-md p-4 overflow-x-auto hidden">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Laporan Keuangan</h3>
        @if ($laporanKeuangan->isEmpty())
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative text-center">
                <span class="block sm:inline">Belum ada data laporan keuangan.</span>
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200" id="keuanganTable">
                <thead class="bg-gray-50 hidden md:table-header-group">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kategori</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Produksi</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jumlah</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($laporanKeuangan as $index => $data)
                        <tr
                            class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                                    class="md:hidden font-semibold text-gray-600">No: </span>{{ $index + 1 }}.</td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Tenant">
                                {{ $data->tenant->user->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Kategori">
                                <span class="md:hidden font-semibold text-gray-600">Kategori: </span>
                                @php
                                    $kategoriClass = '';
                                    switch ($data->keterangan) {
                                        case 'Pemasukan':
                                            $kategoriClass = 'bg-green-100 text-green-800';
                                            break;
                                        case 'pengeluaran':
                                            $kategoriClass = 'bg-red-100 text-red-800';
                                            break;
                                        case 'labarugi':
                                            $kategoriClass = 'bg-blue-100 text-blue-800';
                                            break;
                                        default:
                                            $kategoriClass = 'bg-gray-100 text-gray-800';
                                            break;
                                    }
                                @endphp
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $kategoriClass }}">
                                    {{ ucfirst(str_replace('_', ' ', $data->keterangan)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal Produksi">
                                <span class="md:hidden font-semibold text-gray-600">Tanggal Produksi: </span>
                                {{ \Carbon\Carbon::parse($data->produksi->tanggal_produksi ?? $data->tanggal_produksi)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah"><span
                                    class="md:hidden font-semibold text-gray-600">Jumlah: </span>Rp.
                                {{ number_format($data->jumlah, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Deskripsi"><span
                                    class="md:hidden font-semibold text-gray-600">Deskripsi:
                                </span>{{ Str::limit($data->deskripsi, 50, '...') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


    <script>
        // filtering
        document.addEventListener('DOMContentLoaded', function() {
            window.showTab = function(tabId) {
                document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                    tabContent.classList.add('hidden');
                });

                document.querySelectorAll('.flex-wrap button').forEach(function(button) {
                    button.classList.remove('bg-blue-600', 'text-white');
                    button.classList.add('bg-gray-200', 'text-gray-700');
                });

                document.getElementById(tabId + 'Tab').classList.remove('hidden');
                event.currentTarget.classList.remove('bg-gray-200', 'text-gray-700');
                event.currentTarget.classList.add('bg-blue-600', 'text-white');
            }
            window.filterTable = function() {
                const searchInput = document.getElementById('searchInput');
                const filter = searchInput.value.toLowerCase();
                let activeTableId = '';
                document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                    if (!tabContent.classList.contains('hidden')) {
                        activeTableId = tabContent.id.replace('Tab', 'Table');
                    }
                });

                if (!activeTableId) return;

                const table = document.getElementById(activeTableId);
                if (!table) return;

                const tr = table.getElementsByTagName('tr');
                const tbody = table.querySelector('tbody');
                if (!tbody) return;

                const rows = tbody.getElementsByTagName('tr');

                for (let i = 0; i < rows.length; i++) {
                    let displayRow = false;
                    const cells = rows[i].getElementsByTagName('td');
                    for (let j = 0; j < cells.length; j++) {
                        const cell = cells[j];
                        if (cell) {
                            const textValue = cell.textContent || cell.innerText;
                            if (textValue.toLowerCase().indexOf(filter) > -1) {
                                displayRow = true;
                                break;
                            }
                        }
                    }
                    rows[i].style.display = displayRow ? '' : 'none';
                }
            }
            showTab('produksi');
        });
    </script>
@endsection
