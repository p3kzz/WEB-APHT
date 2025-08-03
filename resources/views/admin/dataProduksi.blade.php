@extends('layouts.admin')
@php use Illuminate\Support\Str; @endphp

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Data Produksi Tenant</h2>

        <!-- Search Input -->
        {{-- <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Cari data produksi..."
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                onkeyup="filterTable()">
        </div> --}}

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

        <div class="bg-white rounded-lg shadow-md p-4 overflow-x-auto">
            @if ($produksi->isEmpty())
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative text-center">
                    <span class="block sm:inline">Belum ada data produksi yang tersedia.</span>
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
                                Tenant</th>
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
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Keterangan</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($produksi as $index => $data)
                            <tr
                                class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                                        class="md:hidden font-semibold text-gray-600">No: </span>{{ $index + 1 }}.</td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Tenant">
                                    <span class="md:hidden font-semibold text-gray-600">Nama Tenant:
                                    </span>{{ $data->tenant->user->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Produk">
                                    <span class="md:hidden font-semibold text-gray-600">Nama Produk:
                                    </span>{{ $data->nama_produk }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Biaya Produksi">
                                    <span class="md:hidden font-semibold text-gray-600">Biaya Produksi: </span>Rp.
                                    {{ number_format($data->biaya_produksi, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell"
                                    data-label="Tanggal Produksi"><span
                                        class="md:hidden font-semibold text-gray-600">Tanggal Produksi:
                                    </span>{{ \Carbon\Carbon::parse($data->tanggal_produksi)->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Jumlah"><span
                                        class="md:hidden font-semibold text-gray-600">Jumlah:
                                    </span>{{ number_format($data->jumlah, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Keterangan">
                                    <span class="md:hidden font-semibold text-gray-600">Keterangan:</span>
                                    @if ($data->keterangan)
                                        {{ Str::limit($data->keterangan, 50, '...') }}
                                    @else
                                        <span class="text-gray-500">anda belum memberi keterangan</span>
                                    @endif
                                </td>
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
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
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
                <label class="block text-sm font-medium">Biaya Produksi</label>
                <input type="email" class="w-full mt-1 p-2 border rounded-md" name="biayaproduksi" placeholder="BiayaProduksi" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Tanggal Produksi</label>
                <input type="password" class="w-full mt-1 p-2 border rounded-md" name="tanggalproduksi"
                    placeholder="Tanggal Produksi" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Jumlah</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" name="jumlah"
                    placeholder="Jumlah" />
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


    <script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.filterTable = function() {
                const searchInput = document.getElementById('searchInput');
                const filter = searchInput.value.toLowerCase();

                const table = document.getElementById('produksiTable');
                if (!table) return;

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
        });
    </script>
@endsection
