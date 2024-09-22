<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    protected $table = 'transaksi_penjualan';  // Pastikan nama tabel sesuai dengan database

    public function get_transaksi()
    {
        return $this->select("transaksi_penjualan.*", "products.product_name as product_name")
                    ->join('products', 'products.id', '=', 'transaksi_penjualan.id_product');
    }
}
