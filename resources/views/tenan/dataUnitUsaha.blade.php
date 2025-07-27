@extends('layouts.tenant')
@php use Illuminate\Support\Str; @endphp
@php use Illuminate\Support\Facades\Auth; @endphp

@section('content')
    @php
        $RejectPengajuan = $pengajuan->contains('status', 'ditolak');
    @endphp
    <div
        class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6 bg-white p-4 rounded-lg shadow-sm">
        <input type="text" placeholder="Cari pengajuan..."
            class="w-full lg:w-1/3 p-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500" />
        <div class="flex items-center space-x-4 ml-auto">
            <div
                class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded-full cursor-pointer hover:bg-gray-200 transition-colors duration-200">
                <img src="{{ asset('assets/img/notification.png') }}" alt="Notification Icon" class="w-5 h-5 object-contain">
            </div>
            <div class="h-6 w-px bg-gray-300 hidden lg:block"></div>
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full">
                    <img src="{{ asset('assets/img/user.png') }}" alt="User Icon" class="w-5 h-5 object-contain">
                </div>
                <div class="text-right">
                    <div class="text-blue-800 font-bold ">{{ Auth::user()->name ?? 'Pengguna' }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->role ?? 'Tenant' }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
        <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>
        <a href="">
            <button class="px-4 py-2 text-white bg-green-500 rounded-full">Tambah</button>
        </a>
       
    </div>


    <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <table class="w-full table-auto text-sm">
            <thead class="border-b">
                <tr class="text-left text-gray-600">
                    <th class="py-2">No</th>
                    <th class="py-2">Nama Tenan</th>
                    <th class="py-2">Lokasi</th>
                    <th class="py-2">Kontak</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tenants as $index => $tenant)
                    <tr class="border-t">
                        <td class="py-2">{{ $index + 1 }}.</td>
                        <td class="py-2">{{ $tenant->name }}</td>
                        <td class="py-2">{{ $tenant->alamat }}</td>
                        <td class="py-2">{{ $tenant->no_hp }}</td>
                        <td class="py-2 text-green-600 font-semibold">{{ ucfirst($tenant->status) }}</td>
                        <td class="py-2">
                            <div class="flex items-center gap-2">
                                <a href=""
                                class="px-3 py-1 bg-green-500 text-white text-xs rounded-full"
                                onclick="return confirm('Yakin ingin memverifikasi tenant ini?');">
                                    Verification
                                </a>

                                <a href="/hapus/{{ $tenant->id }}/tenant"
                                class="px-3 py-1 bg-red-500 text-white text-xs rounded-full"
                                onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </a>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>



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
        @if ($pengajuan->isEmpty())
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative text-center">
                <span class="block sm:inline">Belum ada data pengajuan yang tersedia.</span>
                <a href="{{ route('tenant.dataUsaha.create') }}"
                    class="text-blue-800 font-semibold hover:underline ml-2">Buat Pengajuan Baru</a>
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 hidden md:table-header-group">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Pengajuan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Unit Usaha
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        @if ($RejectPengajuan)
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Komentar
                            </th>
                        @endif
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            File Pengajuan
                        </th>
                        @if ($RejectPengajuan)
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pengajuan as $index => $data)
                        <tr
                            class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No">
                                <span class="md:hidden font-semibold text-gray-600">No: </span>
                                {{ $index + 1 }}.
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Tanggal Pengajuan">
                                <span class="md:hidden font-semibold text-gray-600">Tanggal Pengajuan: </span>
                                {{ \Carbon\Carbon::parse($data->tanggal_pengajuan)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Unit Usaha">
                                <span class="md:hidden font-semibold text-gray-600">Unit Usaha: </span>
                                {{ $data->unit_usaha }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Deskripsi">
                                <span class="md:hidden font-semibold text-gray-600">Deskripsi: </span>
                                {{ Str::limit($data->deskripsi, 50, '...') }}
                            </td>
                            <td class="px-6 py-4 text-sm block md:table-cell" data-label="Status">
                                <span class="md:hidden font-semibold text-gray-600">Status: </span>
                                @php
                                    $statusClass = '';
                                    switch ($data->status) {
                                        case 'pending':
                                            $statusClass = 'bg-yellow-100 text-yellow-800';
                                            break;
                                        case 'disetujui':
                                            $statusClass = 'bg-green-100 text-green-800';
                                            break;
                                        case 'ditolak':
                                            $statusClass = 'bg-red-100 text-red-800';
                                            break;
                                        default:
                                            $statusClass = 'bg-gray-100 text-gray-800';
                                            break;
                                    }
                                @endphp
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                    {{ ucfirst($data->status) }}
                                </span>
                            </td>
                            @if ($RejectPengajuan)
                                <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Komentar">
                                    <span class="md:hidden font-semibold text-gray-600">Komentar: </span>
                                    @if ($data->status == 'ditolak')
                                        {{ $data->komentar ?? 'Tidak ada komentar.' }}
                                    @else
                                        -
                                    @endif
                                </td>
                            @endif
                            <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="File Pengajuan">
                                <span class="md:hidden font-semibold text-gray-600">File Pengajuan: </span>
                                @if ($data->file_pengajuan)
                                    <a href="{{ Storage::url($data->file_pengajuan) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-900 hover:underline">
                                        Lihat File
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            @if ($RejectPengajuan)
                                <td class="px-6 py-4 text-sm block md:table-cell text-right md:text-left" data-label="Aksi">
                                    <span class="md:hidden font-semibold text-gray-600">Aksi: </span>
                                    @if ($data->status == 'ditolak')
                                        <a href="{{ route('tenant.dataPengajuan.edit', $data->id) }}"
                                            class="inline-flex items-center px-3 py-1 bg-blue-500 text-white text-xs font-semibold rounded-full hover:bg-blue-600 transition-colors duration-200">
                                            Update Pengajuan
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection
