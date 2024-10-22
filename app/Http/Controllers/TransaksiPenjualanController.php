<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TransaksiPenjualanController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // Get all transaksi penjualan (sales transactions) with only id, nama kasir, and tanggal transaksi
        $transaksi = new TransaksiPenjualan;
        $transaksiPenjualan = $transaksi->get_transaksi()->paginate(10);

        // Render view with transaksiPenjualan
        return view('transaksi_penjualans.index', compact('transaksiPenjualan'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $transaksi = new TransaksiPenjualan;
        $data['transaksi_penjualans'] = $transaksi->get_transaksi()->get();

        return view('transaksi_penjualans.create', compact(var_name:'data'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return RedirectResponse
     */
    
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $validated = $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
        ]);
    
        // Create a new TransaksiPenjualan
        TransaksiPenjualan::create($validated);
    
        // Redirect with success message
        return redirect()->route('transaksi_penjualans.index')->with('success', 'Transaksi Penjualan berhasil disimpan');
    }
    

    /**
     * show
     *
     * @param string $id
     * @return View
     */
    public function show($id)
    {
        // Find the transaksi penjualan record by ID
        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);
        
        // Return the show view with the transaction data
        return view('transaksi_penjualans.show', compact('transaksiPenjualan'));
    }

    /**
     * edit
     *
     * @param string $id
     * @return View
     */
    public function edit($id)
    {
        // Find the transaksi penjualan record by ID
        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);

        // Return the edit view with the transaction data
        return view('transaksi_penjualans.edit', compact('transaksiPenjualan'));
    }

    /**
     * update
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
   public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
        ]);

        // Find the transaksi penjualan record by ID
        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);
        
        // Update the record with the new data
        $transaksiPenjualan->update([
            'nama_kasir' => $request->nama_kasir,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);


        // Redirect back to the transaction index
        return redirect()->route('transaksi_penjualans.index')->with(['success' => 'Transaksi Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // Get transaction by id
        $transaksi = new TransaksiPenjualan;
        $transaksiPenjualan = $transaksi->get_transaksi()->where('transaksi_penjualans.id', $id)->firstOrFail();

        // Delete the transaction
        $transaksiPenjualan->delete();

        // Redirect back to the transaction index
        return redirect()->route('transaksi_penjualans.index')->with(['success' => 'Transaksi Berhasil Dihapus!']);
    }
}
