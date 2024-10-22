<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiPenjualan;
use App\Models\TransaksiPenjualan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class detailTransaksiPenjualanController extends Controller
{
    /**
     * index
     * 
     * @return View
     */
    public function index(): View
    {        
        // $details = DetailTransaksiPenjualan::select(
        //                 'transaksi_penjualan.nama_kasir',
        //                 'transaksi_penjualan.tanggal_transaksi',
        //                 'products.title',
        //                 'products.price',
        //                 'detail_transaksi_penjualan.jumlah_pembelian',
        //                 DB::raw('products.price * detail_transaksi_penjualan.jumlah_pembelian AS total_harga')
        //             )
        //             ->join('transaksi_penjualan', 'transaksi_penjualan.id', '=', 'detail_transaksi_penjualan.transaksi_penjualan_id')
        //             ->join('products', 'products.id', '=', 'detail_transaksi_penjualan.product_id')
        //             ->latest('transaksi_penjualan.tanggal_transaksi')
        //             ->paginate(10);

        $detailTransaksiPenjualan = new DetailTransaksiPenjualan;
        $detailTransaksiPenjualans = $detailTransaksiPenjualan->with(['transaksiPenjualan', 'product']) // assuming relations are set
            ->latest()
            ->paginate(10);

        // Render view with detail transaksi penjualans
        return view('detail_transaksi_penjualans.index', compact('detailTransaksiPenjualans'));
    }

    /**
     * create
     * 
     * @return View
     */
    public function create(): View
    {
        // Get all transactions and products for the dropdowns
        $transactions = TransaksiPenjualan::all();
        $products = Product::all();

        return view('detail_transaksi_penjualans.create', compact('transactions', 'products'));
    }

    /**
     * store
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the input
        $validatedData = $request->validate([
            'transaksi_penjualan_id' => 'required|exists:transaksi_penjualan,id',
            'product_id'             => 'required|exists:products,id',
            'jumlah_pembelian'       => 'required|integer|min:1',
        ]);

        // Create a new detail transaction
        DetailTransaksiPenjualan::create([
            'transaksi_penjualan_id' => $validatedData['transaksi_penjualan_id'],
            'product_id'             => $validatedData['product_id'],
            'jumlah_pembelian'       => $validatedData['jumlah_pembelian'],
        ]);

        // Redirect to index with success message
        return redirect()->route('detail_transaksi_penjualans.index')->with(['success' => 'Detail Transaksi berhasil disimpan!']);
    }

    /**
     * edit
     * 
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Get the detail transaction by ID
        $detail = DetailTransaksiPenjualan::findOrFail($id);

        // Get all transactions and products for the dropdowns
        $transactions = TransaksiPenjualan::all();
        $products = Product::all();

        return view('detail_transaksi_penjualans.edit', compact('detail', 'transactions', 'products'));
    }

    /**
     * update
     * 
     * @param Request $request, int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // Validate the input
        $validatedData = $request->validate([
            'transaksi_penjualan_id' => 'required|exists:transaksi_penjualan,id',
            'product_id'             => 'required|exists:products,id',
            'jumlah_pembelian'       => 'required|integer|min:1',
        ]);

        // Find the detail transaction
        $detail = DetailTransaksiPenjualan::findOrFail($id);

        // Update the transaction details
        $detail->update([
            'transaksi_penjualan_id' => $validatedData['transaksi_penjualan_id'],
            'product_id'             => $validatedData['product_id'],
            'jumlah_pembelian'       => $validatedData['jumlah_pembelian'],
        ]);

        // Redirect to index with success message
        return redirect()->route('detail_transaksi_penjualans.index')->with(['success' => 'Detail Transaksi berhasil diubah!']);
    }

    /**
     * destroy
     * 
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Find the detail transaction
        $detail = DetailTransaksiPenjualan::findOrFail($id);

        // Delete the transaction
        $detail->delete();

        // Redirect to index with success message
        return redirect()->route('detail_transaksi_penjualans.index')->with(['success' => 'Detail Transaksi berhasil dihapus!']);
    }
}
