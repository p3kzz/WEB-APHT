<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $table = 'produksi';
    protected $fillable = [
        'produksi_id',
        'nama_produk',
        'bahan_baku',
        'biaya_produksi',
        'tanggal_produksi',
        'jumlah',
        'keterangan',
        'status',
    ];

    public function tenant()
    {
        return $this->belongsTo(TenantModel::class);
    }

    public function LaporanKeuangan()
    {
        return $this->hasMany(LaporanKeuangan::class);
    }
}
