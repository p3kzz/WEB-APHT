<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $fillable = [
        'pengajuan_id',
        'tanggal_pengajuan',
        'unit_usaha',
        'file_pengajuan',
        'deskripsi',
        'status',
        'komentar',
    ];

    public function tenant()
    {
        return $this->belongsTo(TenantModel::class);
    }
}
