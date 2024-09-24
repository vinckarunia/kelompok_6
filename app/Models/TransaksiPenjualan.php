<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan';

    protected $dates = ['tanggal_transaksi'];  

    public function get_transaksi()
    {
        return $this->select(
                "transaksi_penjualan.*", 
                "products.title as nama_produk", 
                "products.price as harga", 
                "category_product.product_category_name as kategori_produk" 
            )
            ->join('products', 'products.id', '=', 'transaksi_penjualan.id_product')
            ->join('category_product', 'category_product.id', '=', 'products.product_category_id'); 
    }
}
