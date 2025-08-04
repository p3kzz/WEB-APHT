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
                <tr class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                    <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                    <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Stock</th>
                    <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pendapatan</th>
                    <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Laba</th>
                    <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                                class=" md:hidden font-semibold text-gray-600">No : </span>1.</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Produk"><span
                                class=" md:hidden font-semibold text-gray-600">Nama Produk : </span>Pemasukan</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal"><span
                                class=" md:hidden font-semibold text-gray-600">Tanggal : </span>11-January-2020</td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah Stock"><span
                                class=" md:hidden font-semibold text-gray-600">Jumlah Stock : </span>Rp. 2000.000 </td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Pendapatan"><span
                                class=" md:hidden font-semibold text-gray-600">Pendapatan : </span></td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Total Laba"><span
                                class=" md:hidden font-semibold text-gray-600">Total Laba : </span></td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Deskripsi"><span
                                class=" md:hidden font-semibold text-gray-600">Deskripsi : </span></td>
                    <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"></td>

                    <td class="py-2 px-3 text-center">
                        <div class="inline-flex gap-2">
                            <button onclick="openModal()" class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-800 transition">Edit</button>
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
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">

    <div
        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
            bg-white w-full max-w-md p-6 rounded-lg shadow-lg">

        <button onclick="closeModal()"
            class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>

        <h2 class="text-xl font-semibold mb-4">Edit</h2>
        <form method="POST" action="#">

            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Produk</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" name="name"
                    placeholder="Nama Produk" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Tanggal Produksi</label>
                <input type="password" class="w-full mt-1 p-2 border rounded-md" name="tanggalproduksi"
                    placeholder="Password" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Jumlah Stok</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" name="jumlah"
                    placeholder="Jumlah" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Pendapatan</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" name="pendapatan"
                    placeholder="Pendapatan" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Total Laba</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" name="total_laba"
                    placeholder="Total Laba" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Deskripsi</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" name="deskripsi"
                    placeholder="Deskripsi" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Keterangan</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" name="keetrangan"
                    placeholder="Keeterangan" />
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-md">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
            </div>
        </form>
    </div>
</div>


<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

</script>

@endsection
