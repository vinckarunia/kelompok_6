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

        // Create transaksi_penjualan table
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('id_products'); // Adjust if it should reference suppliers
            $table->integer('jumlah_pembelian');  
            $table->string('nama_kasir');  
            $table->timestamp('tanggal_transaksi');
            $table->timestamps();  

            // If id_products references products or suppliers, add foreign key
            $table->foreign('id_products')->references('id')->on('products')->onDelete('cascade'); // Modify to 'suppliers' if appropriate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan');
        Schema::dropIfExists('suppliers'); // Drop suppliers table if needed
    }
};
