<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantModel extends Model
{
    use HasFactory;
    protected $table = 'tenant';
    protected $fillable = [
        'users_id',
        'name',
        'alamat',
        'no_hp',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'tenant_id');
    }

    public function produksi()
    {
        return $this->hasMany(Produksi::class, 'tenant_id');
    }

    public function LaporanKeuangan()
    {
        return $this->hasMany(LaporanKeuangan::class, 'tenant_id');
    }
}
