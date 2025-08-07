@extends('layouts.admin')

@section('content')
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
                                <a href="{{ route('admin_apht.PengajuanTenant.edit', $item->id) }}"
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
