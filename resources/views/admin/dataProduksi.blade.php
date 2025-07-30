@extends('layouts.admin')
@section('content')
        <div class="flex flex-wrap gap-2 items-center mb-6">
            <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
            <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
            <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
            <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>

        </div>

        <div class="bg-white rounded shadow p-4 "> 
            <table class="w-full table-auto text-sm">
                <thead class="bg-gray-50 hidden md:table-header-group">
                    <tr
                        class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Produk
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                            Produksi</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biaya
                            Produksi</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                                class=" md:hidden font-semibold text-gray-600">No : </span>1.</td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Produk"> <span
                                class="md:hidden font-semibold text-gray-600">Nama Produk :</span>babab</td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal Produksi"> <span
                                class=" md:hidden font-semibold text-gray-600"> Tanggal Produksi :</span>11-January-2020
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Biaya Produksi"> <span
                                class="md:hidden font-semibold text-gray-600">Biaya Produksi</span>Rp. 2000.000 </td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah"><span
                                class="md:hidden font-semibold text-gray-600"> Jumlah : </span> 500 </td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Deskri">
                            <div class=""></div>
                        </td>

                        <td class="py-2 px-3 text-center">
                            <div class="inline-flex gap-2">
                                <button type="button"
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition"
                                    onclick="alert('Aksi edit')">
                                    Edit
                                </button>
                                <button type="button"
                                    class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition"
                                    onclick="confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    @endsection
