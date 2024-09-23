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
        $transaksi = (new TransaksiPenjualan)->get_transaksi()
                                         ->latest()
                                         ->paginate(10);

        return view('TransaksiPenjualan.index', compact('transaksi'));
    }
}
