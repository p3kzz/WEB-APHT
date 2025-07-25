@extends('layouts.tenant')

@section('content')
    <div class="">
        <h2 class="text-xl font-bold mb-5">Pengajuan Tenant</h2>

        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-700 bg-red-100 p-2 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tenant.dataUsaha.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- ID user login --}}
            {{-- <input type="hidden" name="pengajuan_id" value="{{ auth()->id() }}"> --}}

            <div>
                <label class="block font-semibold mb-1">Tanggal Pengajuan</label>
                <input type="date" name="tanggal_pengajuan" class="w-full border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Unit Usaha</label>
                <input type="text" name="unit_usaha" class="w-full border-gray-300 rounded px-3 py-2"
                    placeholder="Masukkan Nama Unit Usaha" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">File Pengajuan</label>
                <input type="file" name="file_pengajuan" class="w-full border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border-gray-300 rounded px-3 py-2" rows="4" required></textarea>
            </div>

            {{-- Tidak ada input untuk status atau komentar di sini --}}

            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
