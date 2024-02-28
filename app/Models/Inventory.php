<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'address', 'contact_person', 'type'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'reorder_level');
    }

    public function productInventories() //
{
    return $this->belongsToMany(ProductInventory::class, 'inventory_product');
}

}
