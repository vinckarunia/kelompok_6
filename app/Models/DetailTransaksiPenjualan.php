<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailTransaksiPenjualan extends Model
{
    use HasFactory;

    public function getAllTransactionDetails()
    {
        $sql = $this->select(
                        'transaksi_penjualans.nama_kasir',
                        'transaksi_penjualans.tanggal_transaksi',
                        'products.title',
                        'products.price',
                        'detail_transaksi_penjualans.jumlah_pembelian',
                        DB::raw('products.price * detail_transaksi_penjualans.jumlah_pembelian AS total_harga')
                    )
                    ->join('transaksi_penjualans', 'transaksi_penjualans.id', '=', 'detail_transaksi_penjualans.transaksi_penjualan_id')
                    ->join('products', 'products.id', '=', 'detail_transaksi_penjualans.id_product')
                    ->latest('transaksi_penjualans.tanggal_transaksi');
        
        return $sql;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_penjualan_id',
        'id_product',
        'jumlah_pembelian',
    ];

    /**
     * Get the transaction that owns the detail transaction.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaksiPenjualan()
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'transaksi_penjualan_id');
    }

    /**
     * Get the product associated with the detail transaction.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    /**
     * Get the total price (jumlah_pembelian * price).
     * 
     * @return float
     */
    public function getTotalHargaAttribute()
    {
        return $this->products->price * $this->jumlah_pembelian;
    }
}
