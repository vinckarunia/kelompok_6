<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualans';
    protected $fillable = [
        'nama_kasir',
        'tanggal_transaksi',
        // Add other fields as necessary
    ];

    public function get_transaksi()
    {
        // This function retrieves all transactions, modify as needed
        return $this->select('transaksi_penjualans.*')
                    ->orderBy('tanggal_transaksi', direction: 'desc');
    }
}
