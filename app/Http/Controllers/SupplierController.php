<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        // Fetch all suppliers, with pagination if needed
        $suppliers = Supplier::paginate(10); // or Supplier::paginate(10);

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * 
     * create
     * 
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request)
    {
        // Validate and create a new supplier
        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'pic_supplier'  => 'nullable|string|max:255',
            'alamat_supplier' => 'required|string|max:255',
            'no_hp_pic_supplier' => 'nullable|numeric|digits_between:8,14',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    /**
     * Show the form for editing the specified supplier.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Validate and update the supplier
        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'pic_supplier'  => 'nullable|string|max:255',
            'alamat_supplier' => 'required|string|max:255',
            'no_hp_pic_supplier' => 'nullable|numeric|digits_between:8,14',
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
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
