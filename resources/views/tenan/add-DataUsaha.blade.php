@extends('layouts.tenant')

@section('content')
<div class=" ">
    <h2 class="text-xl font-bold mb-5">Pengajuan Tenant</h2>

     @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">{{ session('success') }}</div>
    @endif

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Nama Penanggung Jawab</label>
            <input name="pengajuan_id" class="w-full border-gray-300 rounded px-3 py-2">
                 {{-- @foreach($tenants as $tenant)
                    <option value="{{ $tenant->id }}">{{ $tenant->nama }}</option>
                @endforeach --}}
        </input>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tanggal Pengajuan</label>
            <input type="date" name="tanggal_pengajuan" class="w-full border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Unit Usaha</label>
            <input type="text" name="unit_usaha" class="w-full border-gray-300 rounded px-3 py-2" placeholder="Masukkan Nama Unit Usaha" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">File Pengajuan</label>
            <input type="file" name="file_pengajuan" class="w-full border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border-gray-300 rounded px-3 py-2" rows="4" required></textarea>
        </div>

        {{-- <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="w-full border-gray-300 rounded px-3 py-2" required>
                <option value="pending" selected>Pending</option>
                <option value="ditolak">Ditolak</option>
                <option value="disetujui">Disetujui</option>
            </select>
        </div> --}}

        {{-- <div>
            <label class="block font-semibold mb-1">Komentar (Opsional)</label>
            <input type="text" name="komentar" class="w-full border-gray-300 rounded px-3 py-2">
        </div> --}}

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
