<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use App\Models\TenantModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PengajuanSeeder extends Seeder
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

        Storage::put('pengajuan/dummy.pdf', 'isi file dummy');

        Pengajuan::create([
            'pengajuan_id' => $tenant->id,
            'tanggal_pengajuan' => now()->toDateString(),
            'unit_usaha' => 'Usaha Tani Cabe',
            'file_pengajuan' => 'pengajuan/dummy.pdf',
            'deskripsi' => 'Pengajuan untuk pengembangan unit usaha cabe.',
            'status' => 'disetujui',
            'komentar' => null,
        ]);
    }
}
