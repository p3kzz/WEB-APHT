<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    use HasFactory;
    protected $table = 'laporan_keuangan';
    protected $fillable = [
        'LK_id',
        'TP_id',
        'keterangan',
        'tanggal_produksi',
        'deskripsi',
        'file_lk'
    ];

    public function produksi()
    {
        return $this->belongsTo(Produksi::class);
    }
    public function tenant()
    {
        return $this->belongsTo(TenantModel::class);
    }
}
