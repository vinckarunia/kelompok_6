<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Product extends Model
{
    use HasFactory;

    /**
     *fillable
     * 
     *  
     * @var array
     */
    protected $fillable = [
        'image',
        'id_supplier',
        'title',
        'description',
        'price',
        'stock',
        'product_category_id'
    ];

    //Method to Get productss wih their categories
    public function get_product(){
        //get all products
        $sql = $this->select("products.*", "category_product.product_category_name as product_category_name")
                    ->join('category_product', 'category_product.id', '=', 'products.product_category_id')
                    ->join('suppliers', 'supplier_name', '=', 'supplier_name');


        return $sql;
    }
    public function get_category_product(){
        $sql = DB::table('category_product')->select('*');

        return $sql;
    }
}
