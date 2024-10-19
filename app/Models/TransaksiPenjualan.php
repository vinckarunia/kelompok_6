<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualans'; 

    public function details()
    {
        return $this->hasMany(DetailTransaksiPenjualan::class, 'transaksi_penjualan_id');
    }
}
