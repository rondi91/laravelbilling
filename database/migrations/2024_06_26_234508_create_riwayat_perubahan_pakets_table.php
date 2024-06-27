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
        Schema::create('riwayat_perubahan_pakets', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('pelanggan_id')->constrained('pelanggans');
            $table->foreignId('paket_lama_id')->constrained('paket_internets');
            $table->foreignId('paket_baru_id')->constrained('paket_internets');
            $table->date('tanggal_perubahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_perubahan_pakets');
    }
};
