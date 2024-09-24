<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    // Define the table associated with the model (optional if Laravel uses the pluralized form automatically)
    protected $table = 'suppliers';

    // Example fields that could be mass-assigned
    protected $fillable = ['supplier_name', 'pic_supplier'];

    /**
     * Get all suppliers with any necessary joins or additional data.
     */
    public function get_supplier()
    {
        // Example query that selects all supplier data
        // You can modify this query based on your needs
        $sql = $this->select('suppliers.*');

        // If there were related data (like joining with products), you could add a join
        // Example of how to join with another table (if needed):
        // $sql = $sql->join('another_table', 'another_table.supplier_id', '=', 'suppliers.id');

        return $sql;
    }
}
