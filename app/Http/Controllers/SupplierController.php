<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
            'nama_supplier' => 'required|min:5',
            'alamat_supplier' => 'required|min:10',
            'no_hp_pic_supplier' => 'required|numeric',
        ]);

        
        $supplier = Supplier::findOrFail($id);

        
        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            
            Storage::delete('public/images/' . $supplier->image);

            
            $supplier->update([
                'image' => $image->hashName(),
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'no_hp_pic_supplier' => $request->no_hp_pic_supplier,
            ]);
        } else {
            
            $supplier->update([
                'nama_supplier' => $request->nama_supplier,
                'alamat_supplier' => $request->alamat_supplier,
                'no_hp_pic_supplier' => $request->no_hp_pic_supplier,
            ]);
        }

        return redirect()->route('suppliers.index')->with(['success' => 'Data Supplier Berhasil Diubah']);
    }

}
