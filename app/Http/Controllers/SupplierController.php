<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\View\View;
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

    // Metode lain seperti create, store, show, edit, update, destroy jika diperlukan
}
