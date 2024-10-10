<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{

    // Example fields that could be mass-assigned
    protected $fillable = ['supplier_name', 'pic_supplier', 'alamat_supplier', 'no_hp_pic_supplier' ];

    /**
     * Get all suppliers with any necessary joins or additional data.
     */
    public function get_supplier()
    {
    
        $sql = $this->select('suppliers.*');


        return $sql;
    }
}
