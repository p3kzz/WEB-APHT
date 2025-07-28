@extends('layouts.admin')
@section('content')
    <div class="flex flex-row flex-wrap items-center justify-between gap-4 mb-4 px-4">
        <input type="text" placeholder="Search"
            class="flex-1 min-w-[150px]  p-2 px-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />

        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
            <img src="{{ asset('assets/img/notification.png') }}" alt="" class="w-5 h-5 object-contain" />
        </div>

        <div class="w-px h-6 bg-gray-300 hidden md:block"></div>

        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                <img src="{{ asset('assets/img/user.png') }}" alt="User" class="object-cover w-full h-full" />
            </div>
            <div class="hidden md:flex flex-col text-left">
                <div class="text-blue-800 font-bold text-sm">Username</div>
                <div class="text-xs text-gray-500">Admin</div>
            </div>
        </div>

    </div>


    <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
        <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>

    </div>

    <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <table class="w-full table-auto text-sm min-w-[600px]">
            <thead class="bg-gray-50 hidden md:table-header-group">
                <tr
                    class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        Produksi</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biaya
                        Produksi</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No">1.</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Produk">Pemasukan</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal Produksi">11-January-2020</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Biaya Produksi">Rp. 2000.000 </td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah"> 500 </td>
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
