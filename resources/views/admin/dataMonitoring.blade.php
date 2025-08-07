@extends('layouts.admin') {{-- Asumsi Anda memiliki layout bernama 'layouts.admin' --}}
@php use Illuminate\Support\Str; @endphp

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Data Monitoring Tenant</h2>

        <!-- Search Input -->
        <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Cari nama tenant..."
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                onkeyup="filterTable()">
        </div>

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
            @if ($tenants->isEmpty())
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative text-center">
                    <span class="block sm:inline">Belum ada data tenant yang terdaftar.</span>
                </div>
            @else
                <table class="min-w-full divide-y divide-gray-200" id="tenantTable">
                    <thead class="bg-gray-50 hidden md:table-header-group">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alamat</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.
                                HP</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                aksi</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tenants as $index => $tenant)
                            <tr
                                class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                                        class="md:hidden font-semibold text-gray-600">No : </span>{{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Nama Tenant">
                                    <span class="md:hidden font-semibold text-gray-600">Nama :
                                    </span>{{ $tenant->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Alamat">
                                    <span class="md:hidden font-semibold text-gray-600">Alamat :
                                    </span>{{ Str::limit($tenant->alamat, 50, '...') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No. HP">
                                    <span class="md:hidden font-semibold text-gray-600">No. HP : </span>{{ $tenant->no_hp }}
                                </td>
                                {{-- <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Status">
                                    <span class="md:hidden font-semibold text-gray-600">Status : </span>
                                    @php
                                        $statusClass = '';
                                        switch ($tenant->status) {
                                            case 'pending':
                                                $statusClass = 'bg-yellow-100 text-yellow-800';
                                                break;
                                            case 'aktif':
                                                $statusClass = 'bg-green-100 text-green-800';
                                                break;
                                            case 'non-aktif':
                                                $statusClass = 'bg-red-100 text-red-800';
                                                break;
                                            default:
                                                $statusClass = 'bg-gray-100 text-gray-800';
                                                break;
                                        }
                                    @endphp
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                        {{ ucfirst($tenant->status) }}
                                    </span>
                                </td> --}}
                                <td class="py-2 px-3 text-center">
                                    <div class="inline-flex gap-2">
                                        <a href="{{ route('admin_apht.datamonitoring.edit', $tenant->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition">
                                            Edit
                                        </a>
                                        <a onclick="return confirm('Yakin ingin menghapus?')" href=""
                                            class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition">Hapus</a>

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
                    <input type="text" class="w-full mt-1 p-2 border rounded-md" name="jumlah" placeholder="Jumlah" />
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
