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

            <form action="{{ route('tenant.laporankeuangan.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="produksi_id" class="block text-gray-700 text-sm font-bold mb-2">Pilih Produksi</label>
                    <select name="produksi_id" id="produksi_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($produksiList as $produksi)
                            <option value="{{ $produksi->id }}">
                                Produksi: {{ $produksi->nama_produk }} - Tanggal:
                                {{ \Carbon\Carbon::parse($produksi->tanggal_produksi)->format('d M Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan</label>
                    <select name="keterangan" id="keterangan"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                        {{-- Laba/Rugi tidak perlu diinput, karena dihitung --}}
                    </select>
                </div>

                <div class="mb-4">
                    <label for="jumlah" class="block text-gray-700 text-sm font-bold mb-2">Jumlah (Rp)</label>
                    <input type="number" name="jumlah" id="jumlah"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required></textarea>
                </div>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan Laporan
                </button>
            </form>
        </div>
    </div>
@endsection
