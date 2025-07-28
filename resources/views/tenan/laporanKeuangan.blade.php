@extends('layouts.tenant')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Form Data Keuangan</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Osps! Ada masalah:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tenant.laporankeuangan.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Kategori Laporan</label>
                    <select name="keterangan" id="keterangan"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        required>
                        <option value="">Pilih Kategori</option>
                        <option value="Pemasukan" {{ old('keterangan') == 'Pemasukan' ? 'selected' : '' }}>Pemasukan
                        </option>
                        <option value="pengeluaran" {{ old('keterangan') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran
                        </option>
                        <option value="labarugi" {{ old('keterangan') == 'labarugi' ? 'selected' : '' }}>Laba/Rugi</option>
                    </select>
                    @error('keterangan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_produksi" class="block text-sm font-medium text-gray-700 mb-1">Pilih Tanggal
                        Produksi</label>
                    <select name="tanggal_produksi" id="tanggal_produksi"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        required {{ $produksiList->isEmpty() ? 'disabled' : '' }}>
                        @if ($produksiList->isEmpty())
                            <option value="">tidak ada laporan produksi tersedia</option>
                        @else
                            <option value="">Pilih Tanggal Produksi</option>
                            @foreach ($produksiList as $produksi)
                                <option value="{{ $produksi->tanggal_produksi }}"
                                    {{ old('tanggal_produksi') == $produksi->tanggal_produksi ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::parse($produksi->tanggal_produksi)->format('d M Y') }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                    @error('tanggal_produksi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        value="{{ old('jumlah') }}" required min="0">
                    @error('jumlah')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                        Simpan Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
