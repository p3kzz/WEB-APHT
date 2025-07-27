@extends('layouts.tenant')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Form Data Keuangan</h2>
    <form action="" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="ketengarangan" class="block text-gray-700 font-medium">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-green-200"></textarea>
        </div>

        <div>
            <label for="tanggal_produksi" class="block text-gray-700 font-medium">Tanggal Produksi</label>
            <input type="date" name="tanggal_produksi" id="tanggal_produksi" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-green-200" required>
        </div>
        <div>
            <label for="jumlah" class="block text-gray-700 font-medium">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-green-200" required>
        </div>
        <div>
            <label for="biaya_produksi" class="block text-gray-700 font-medium">Deskripsi</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-green-200"></textarea>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
