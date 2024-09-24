<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    // Get all transactions
    public function index()
{
    $transactions = TransaksiPenjualan::paginate(10);
    return view('transaksipenjualan.index', compact('transactions'));
}


    // Create a new transaction
    public function store(Request $request)
{
    $request->validate([
        'id_products' => 'required|exists:products,id',
        'jumlah_pembelian' => 'required|integer',
        'nama_kasir' => 'required|string|max:255',
        'tanggal_transaksi' => 'required|date',
    ]);

    TransaksiPenjualan::create($request->all());

    return redirect()->route('transaksipenjualan.index')->with('success', 'Transaction created successfully!');
}


    
}
