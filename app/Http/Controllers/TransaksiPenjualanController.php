<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    /**
     * index
     * 
     * @return View
     */
    public function index() : View
    {
        // Mengambil semua transaksi penjualan dengan join ke tabel produk jika diperlukan
        // Misalnya: menggabungkan transaksi dengan data produk terkait
        // $transaksi = TransaksiPenjualan::select("transaksi_penjualan.*", "products.product_name as product_name")
        //                     ->join('products', 'products.id', '=', 'transaksi_penjualan.id_product')
        //                     ->latest()
        //                     ->paginate(10);

        // Atau jika sudah ada method khusus di model:
        $transaksi = (new TransaksiPenjualan)->get_transaksi()
                                             ->latest()
                                             ->paginate(10);

        
        return view('transaksi.index', compact('transaksi'));
    }
}
