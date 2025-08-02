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
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Keterangan
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No">1</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Tenant">tenant</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Keterangan">Pemasukan</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal">11- Mei - 2023</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah">100.000</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Deskripsi">Lorem ipsum dolor
                        sit
                        amet
                        consectetur adipisicing elit. Nisi dolorum libero, cupiditate reprehenderit numquam quia
                        sunt
                        vero nulla maiores! Saepe, dolorum eos consequatur ullam sunt fuga vel suscipit laboriosam
                        praesentium.</td>

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
