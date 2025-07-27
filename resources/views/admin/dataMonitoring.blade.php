@extends('layouts.admin')

@section('content')

<h1>SELAMAT DATANG Monitoring </h1>
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
        <input type="text" placeholder="Search" class="w-full  p-2 border border-gray-300 rounded-full" />
        <div class="w-8 h-8 bg-white-200 rounded-full"><img src="{{ asset('assets/img/notification.png') }}" alt="">
        </div>
        <div class="h-6 w-px bg-gray-300"></div>
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gray-200 rounded-full"><img src="{{ asset('assets/img/user.png') }}" alt=""></div>
            <div class="text-right">
                <div class="text-blue-800 font-bold ">Username</div>
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
            <thead class="border-b bg-gray-50">
                <tr class="text-left text-gray-600">
                    <th class="py-2 px-3">No</th>
                    <th class="py-2 px-3">Nama Produk</th>
                    <th class="py-2 px-3">Tanggal</th>
                    <th class="py-2 px-3">Jumlah Stock</th>
                    <th class="py-2 px-3">Pendapatan</th>
                    <th class="py-2 px-3">Total Laba</th>
                    <th class="py-2 px-3">Deskripsi</th>
                    <th class="py-2 px-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-3">1.</td>
                    <td class="py-2 px-3">Pemasukan</td>
                    <td class="py-2 px-3">11-January-2020</td>
                    <td class="py-2 px-3">Rp. 2000.000 </td>
                    <td class="py-2 px-3"></td>
                    <td class="py-2 px-3"></td>
                    <td class="py-2 px-3"></td>
                    <td class="py-2 px-3"></td>

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
