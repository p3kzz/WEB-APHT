@extends('layouts.admin')

@section('content')
    <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
        <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>

    </div>

    <div class="bg-white rounded shadow p-4 ">
        @if ($laporan->isEmpty())
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative text-center">
                <span class="block sm:inline">Belum ada data laporan yang tersedia.</span>
            </div>
        @else
            <table class="w-full table-auto text-sm">
                <thead class="bg-gray-50 hidden md:table-header-group">
                    <tr
                        class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            tenant
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">kategori
                            laporan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                            Produksi</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biaya
                            Produksi</th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $index => $data)
                        <tr
                            class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No">
                                {{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Tenant">
                                {{ $data->tenant->user->name ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Keterangan">
                                {{ $data->keterangan }} </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal Produksi">
                                {{ $data->tanggal_produksi }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Biaya Produksi">
                                Rp.
                                {{ number_format($data->jumlah, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Deskripsi">
                                {{ $data->deskripsi }}
                            </td>

                            <td class="py-2 px-3 text-center">
                                <div class="inline-flex gap-2">
                                    <button type="button"
                                        class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition"
                                        onclick="confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
