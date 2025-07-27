@extends('layouts.tenant')

@section('content')
    <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
        <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>
    </div>

    <div class="bg-white rounded shadow p-4 overflow-x-auto">
    <table class="w-full table-auto text-sm min-w-[600px]">
        <thead class="border-b bg-gray-50">
            <thead class="border-b bg-gray-50">
                <tr class="text-left text-gray-600">
                    <th class="py-2 px-3">No</th>
                    <th class="py-2 px-3">Nama Produk</th>
                    <th class="py-2 px-3">Biaya Produksi</th>
                    <th class="py-2 px-3">Tanggal Produksi</th>
                    <th class="py-2 px-3 text-center">Jumlah</th>
                    <th class="py-2 px-3 text-center">Produksi</th>
                </tr>
        </thead>
        <tbody>
            <tr class="border-t hover:bg-gray-50">
                <td class="py-2 px-3">1.</td>
                <td class="py-2 px-3">Tembakau Kita</td>
                <td class="py-2 px-3">Batuan, Sumenep</td>
                <td class="py-2 px-3">+62 821 1696 5805</td>
                <td class="py-2 px-3">+62 821 1696 5805</td>
                <td class="py-2 px-3">+62 821 1696 5805</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
