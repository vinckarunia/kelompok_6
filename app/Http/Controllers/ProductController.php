<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminat\Support\Facades\Storage; //kebutuhan tugas update

class ProductController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : view
    {
        //get all products
        // $products = Product::select("products.*", "category_product.product_category_name as product_category_name")
        //                      ->join('category_product', 'category_product.id', '=', 'products.product_category_id')
        //                      ->latest()
        //                      ->paginate(10);

        $product = new Product;
        $products = $product->get_product()
                            ->latest()
                            ->paginate(10);

        //render view with products
        return view('products.index', compact('products'));
    }

    /**
     * create
     * 
     * @return view
     */
    public function create(): view{
        $product = new Product;
        $supplier = new Supplier;

        $data['categories'] = $product->get_category_product()->get();
        $data['suppliers'] = $supplier->get_supplier()->get();

        return view('products.create', compact('data'));
    }

    /**\
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */

     public function store(Request $request): RedirectResponse{
        $validateData = $request -> validate([
            'image'                 => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'                 => 'required|min:5',
            'product_category_id'   => 'required|integer',
            'supplier_id'           => 'required|integer',
            'description'           => 'required|min:10',
            'price'                 => 'required|numeric',
            'stock'                 => 'required|numeric',
        ]);

        //Menghandle upload file gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->store('public/images');

            Product::create([
                'image'                 => $image->hashName(),
                'title'                 => $request->title,
                'product_category_id'   => $request->product_category_id,
                'supplier_id'           => $request->supplier_id,
                'description'           => $request->description,
                'price'                 => $request->price,
                'stock'                 => $request->stock,
            ]);
        
            // Redirect to the index route with a success message
            return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }        

        //also redirect to index even when failed
        return redirect()->route('products.index')->with(['error'=>'Data Berhasil Disimpan!']);
     }
}