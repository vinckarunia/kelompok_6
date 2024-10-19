<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiPenjualansTable extends Migration
{
    public function up()
{
    Schema::dropIfExists('detail_transaksi_penjualans');
}

public function down()
{
    // You can reverse the dropping of the table here, if needed
}

}