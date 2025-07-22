<?php

namespace Database\Seeders;

use App\Models\LaporanKeuangan;
use App\Models\Produksi;
use App\Models\TenantModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LaporanKeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = TenantModel::first();
        $produksi = Produksi::first();

        if (!$tenant) {
            $this->command->error('data tenant tidak ada');
        }
        Storage::put('LaporanKeuangan/dummy.pdf', 'isi file dummy');

        LaporanKeuangan::create([
            'LK_id' => $tenant->id,
            'tanggal_produksi' => $produksi->tanggal_produksi,
            'keterangan' => 'Pemasukan',
            'deskripsi' => 'laporan keuangan harian',
            'file_lk' => 'LaporanKeuangan/dummy.pdf'
        ]);
    }
}
