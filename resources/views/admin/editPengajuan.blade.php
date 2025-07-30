@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <h2 class="text-xl font-semibold mb-4">Ubah Status Pengajuan</h2>

        <form action="{{ route('admin.PengajuanTenant.update', $pengajuan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="status" class="block font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 p-2 rounded">
                    <option value="pending">Pending</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="komentar" class="block font-medium text-gray-700">Komentar</label>
                <textarea name="komentar" id="komentar" rows="3" class="w-full border border-gray-300 p-2 rounded">{{ old('komentar', $pengajuan->komentar) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
