@extends('layouts.tenant')

@section('content')
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
        <input type="text" placeholder="Search" class="w-full  p-2 border border-gray-300 rounded-full" />
        <div class="w-8 h-8 bg-white-200 rounded-full"><img src="{{ asset('assets/img/notification.png') }}" alt=""></div>
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
    </div>
@endsection
