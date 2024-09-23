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
        Schema::create('transaksi__penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('id_product');
            $table->integer('jumlah_pembelian'); 
            $table->string('nama_kasir');
            $table->timestamp('tanggal_transaksi'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi__penjualans');
    }
};
