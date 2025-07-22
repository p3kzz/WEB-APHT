<?php

namespace Database\Seeders;

use App\Models\Produksi;
use App\Models\TenantModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = TenantModel::first();
        if (!$tenant) {
            $this->command->error('tidak ada data tenant');
            return;
        }
        Produksi::create([
           'produksi_id' => $tenant->id,
           'tanggal_produksi' => now()->toDateString(),
            'nama_produk' => 'Rokok Kretek',
            'bahan_baku' => 'tembakau',
            'biaya_produksi' => '1000000',
            'jumlah' => '500',
            'status' => 'disetujui',
            'keterangan' => null,
        ]);
    }
}
