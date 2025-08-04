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

                                    <button onclick="openModal()"
                                        class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-800 transition">Edit</button>
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



    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">

        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
            bg-white w-full max-w-md p-6 rounded-lg shadow-lg">

            <button onclick="closeModal()"
                class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>

            <h2 class="text-xl font-semibold mb-4">Edit</h2>
            <form method="POST" action="#">

                <div class="mb-4">
                    <label class="block text-sm font-medium">Nama Tenant</label>
                    <input type="text" class="w-full mt-1 p-2 border rounded-md" name="name"
                        placeholder="Nama Tenant" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Kategori Laporan</label>
                    <input type="text" class="w-full mt-1 p-2 border rounded-md" name="kategori"
                        placeholder="Keeterangan" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tanggal Produksi</label>
                    <input type="password" class="w-full mt-1 p-2 border rounded-md" name="tanggalproduksi"
                        placeholder="Password" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Biaya Porduksi</label>
                    <input type="text" class="w-full mt-1 p-2 border rounded-md" name="jumlah" placeholder="biaya_produksi" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Deskripsi</label>
                    <input type="text" class="w-full mt-1 p-2 border rounded-md" name="deskripsi"
                        placeholder="Deskripsi" />
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-md">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
                </div>
            </form>
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
