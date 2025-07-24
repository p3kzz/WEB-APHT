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
        Schema::create('produksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produksi_id')->constrained('tenant');
            $table->string('nama_produk');
            $table->string('bahan_baku');
            $table->integer('biaya_produksi');
            $table->date('tanggal_produksi');
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->enum('status', ['pending', 'disetujui', 'tolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};
