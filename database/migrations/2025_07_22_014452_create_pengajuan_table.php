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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenant');
            $table->date('tanggal_pengajuan');
            $table->string('unit_usaha');
            $table->string('file_pengajuan');
            $table->string('deskripsi');
            $table->enum('status', ['pending', 'ditolak', 'disetujui'])->default('pending');
            $table->string('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
