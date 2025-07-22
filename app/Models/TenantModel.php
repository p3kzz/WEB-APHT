<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantModel extends Model
{
    use HasFactory;
    protected $table = 'tenant';
    protected $fillable = [
        'tenant_id',
        'name',
        'alamat',
        'no_hp',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
    public function produksi()
    {
        return $this->hasMany(Produksi::class);
    }
    public function LaporanKeuangan()
    {
        return $this->hasMany(LaporanKeuangan::class);
    }
}
