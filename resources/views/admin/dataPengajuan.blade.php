@extends('layouts.admin')

@section('content')
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


    <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <table class="w-full table-auto text-sm min-w-[600px]">
            <thead class="border-b bg-gray-50">
                <tr class="text-left text-gray-600">
                    <th class="py-2 px-3">No</th>
                    <th class="py-2 px-3">Tanggal Pengajuan</th>
                    <th class="py-2 px-3">Unit Usaha</th>
                    <th class="py-2 px-3">File Pengajuan</th>
                    <th class="py-2 px-3 text-center">Deskirpsi</th>
                    <th class="py-2 px-3 text-center">Status</th>
                    <th class="py-2 px-3 text-center">Komentar</th>
                    <th class="py-2 px-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan as $index => $item)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-3">{{ $index + 1 }}</td>
                        <td class="py-2 px-3">{{ $item->tanggal_pengajuan }}</td>
                        <td class="py-2 px-3">{{ $item->unit_usaha }}</td>
                        <td class="py-2 px-3"><a href="{{ Storage::url($item->file_pengajuan) }}" target="_blank"
                                class="text-blue-600 hover:text-blue-900 hover:underline">
                                Lihat File
                            </a></td>
                        <td class="py-2 px-3">{{ $item->deskripsi }}</td>
                        @php
                            $status = $item->status;
                            $statusClass = match ($status) {
                                'disetujui' => 'bg-green-100 text-green-700',
                                'ditolak' => 'bg-red-100 text-red-700',
                                default => 'bg-gray-100 text-gray-800', // default: Pending/Menunggu
                            };
                        @endphp
                        <td class="py-2 px-3 text-center">
                            <span class="px-3 py-1 rounded-full font-semibold text-sm {{ $statusClass }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="py-2 px-3">{{ $item->komentar }}</td>

                        <td class="py-2 px-3 text-center">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.PengajuanTenant.edit', $item->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition">
                                    Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
