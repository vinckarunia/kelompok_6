<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan'; // Specify the table name if not the plural of the model name

    protected $fillable = [
        'id_products',
        'jumlah_pembelian',
        'nama_kasir',
        'tanggal_transaksi',
    ];

    // Define relationships, for example:
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_products');
    }
}
