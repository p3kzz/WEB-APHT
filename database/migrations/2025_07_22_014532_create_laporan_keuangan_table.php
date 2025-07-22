<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('LK_id')->constrained('tenant');
            $table->enum('keterangan', ['Pemasukan', 'pengeluaran', 'labarugi']);
            $table->date('tanggal_produksi');
            $table->string('deskripsi');
            $table->string('file_lk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangan');
    }
};
