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
        Schema::create('paket_internets', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_paket');
            $table->integer('kecepatan');
            $table->integer('harga');
            // $table->decimal('harga', 10, 2); // harga dalam rupiah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_internets');
    }
};
