<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $table = 'produksi';
    protected $fillable = [
        'tenant_id',
        'nama_produk',
        'biaya_produksi',
        'tanggal_produksi',
        'jumlah',
        'keterangan',
    ];

    public function tenant()
    {
        return $this->belongsTo(TenantModel::class, 'tenant_id');
    }

    public function LaporanKeuangan()
    {
        return $this->hasMany(LaporanKeuangan::class, 'produksi_id');
    }
}
