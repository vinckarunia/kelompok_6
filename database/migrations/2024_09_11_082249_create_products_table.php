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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->nullable()->index()->constrained('categories'); // Penamaan tabel diperbaiki
            $table->foreignId('supplier_id')->nullable()->index()->constrained('suppliers'); // Penamaan tabel diperbaiki
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->bigInteger('price');
            $table->integer('stock')->default(0);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_name');
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) { // Ubah dari `supplier` menjadi `suppliers`
            $table->id();
            $table->string('nama_supplier');
            $table->string('alamat_supplier');
            $table->string('pic_supplier');
            $table->string('no_hp_pic_supplier'); // Ubah tipe dari integer ke string
            $table->timestamps();
        });

        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_product')->constrained('products'); // Relasi ke tabel products
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
        Schema::dropIfExists('products');
    }
};
