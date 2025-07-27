@extends('layouts.tenant')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Update Pengajuan</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops! Ada masalah:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('tenant.dataPengajuan.update', $pengajuan->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="tanggal_pengajuan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                        Pengajuan</label>
                    <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        value="{{ old('tanggal_pengajuan', $pengajuan->tanggal_pengajuan) }}" required>
                    @error('tanggal_pengajuan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="unit_usaha" class="block text-sm font-medium text-gray-700 mb-1">Unit Usaha</label>
                    <input type="text" name="unit_usaha" id="unit_usaha"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        placeholder="Masukkan Nama Unit Usaha" value="{{ old('unit_usaha', $pengajuan->unit_usaha) }}"
                        required>
                    @error('unit_usaha')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="file_pengajuan" class="block text-sm font-medium text-gray-700 mb-1">File Pengajuan</label>
                    @if ($pengajuan->file_pengajuan)
                        <p class="text-sm text-gray-600 mb-2">File saat ini:
                            <a href="{{ Storage::url($pengajuan->file_pengajuan) }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                Lihat File
                            </a>
                        </p>
                    @endif
                    <input type="file" name="file_pengajuan" id="file_pengajuan"
                        class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none focus:ring-green-500 focus:border-green-500">
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah file. Format: PDF, DOC,
                        DOCX, XLSX (Max 2MB).</p>
                    @error('file_pengajuan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        required>{{ old('deskripsi', $pengajuan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        Update Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
