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
            $table->foreignId('tenant_id')->constrained('tenant');
            $table->foreignId('produksi_id')->constrained('produksi');
            $table->enum('keterangan', ['Pemasukan', 'pengeluaran', 'labarugi']);
            $table->date('tanggal_produksi');
            $table->integer('jumlah');
            $table->string('deskripsi');
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
