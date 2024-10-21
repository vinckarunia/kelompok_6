<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{
    /**
     * Menampilkan daftar supplier.
     * 
     * @return View
     */
    public function index() : View
    {
        // Membuat instance model Supplier
        $supplier = new Supplier;
        
        // Membangun query, menambahkan latest() dan paginate()
        $suppliers = $supplier->get_supplier()
                            ->latest()
                            ->paginate(10);
        
        // Render view dengan suppliers
        return view('supplier.index', compact('suppliers'));
    }


    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request):RedirectResponse
    {
        //validate from
        $validatedData = $request->validate([
            'nama_supplier'         => 'required|min:5',
            'alamat_supplier'       => 'required|min:5',
            'pic_supplier'          => 'required|min:5',
            'no_hp_pic_supplier'    => 'required|min:10|max:13'
        ]);
 
        //create Product
        Supplier::create([
            'nama_supplier'         => $request->nama_supplier,
            'alamat_supplier'       => $request->alamat_supplier,
            'pic_supplier'          => $request->pic_supplier,
            'no_hp_pic_supplier'    => $request->no_hp_pic_supplier
        ]);
  
            //redirect to index
        return redirect()->route('suppliers.index')->with(['success' => 'Data berhasil disimpan!']);
    }


    /**
      * show 
      *
      * @param mixed $id
      * @return View
      */
      public function show(string $id): View 
      {

        //get data by ID
        $supplier_model = new Supplier;
        $supplier = $supplier_model->get_supplier()->where("id", $id)->firstOrFail();

        return view('supplier.show', compact('supplier'));
      }

    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Mengambil data supplier berdasarkan ID
        $supplier = Supplier::findOrFail($id); // Menggunakan findOrFail untuk mendapatkan supplier

        // Mengembalikan view dengan data supplier
        return view('supplier.edit', compact('supplier')); // Menggunakan compact untuk mengirimkan data
    }



    /**
     * update
     * 
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        
        $request->validate([
            'nama_supplier'         => 'required|min:5',
            'alamat_supplier'       => 'required|min:10',
            'pic_supplier'          => 'required|min:5',
            'no_hp_pic_supplier'    => 'required|numeric',
        ]);

        
        $supplier = Supplier::findOrFail($id);

        
        $supplier->update([
                'nama_supplier'         => $request->nama_supplier,
                'alamat_supplier'       => $request->alamat_supplier,
                'pic_supplier'          => $request->pic_supplier,
                'no_hp_pic_supplier'    => $request->no_hp_pic_supplier,
            ]);
            return redirect()->route('suppliers.index')->with(['success' => 'Data Supplier Berhasil Diubah']);        
    }

    /**
     * Remove the specified supplier from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
