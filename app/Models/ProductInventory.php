<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

    protected $table = 'inventory_product';

    protected $fillable = ['quantity', 'reorder_level'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'inventory_product')
                    ->withPivot('quantity', 'reorder_level');
    }
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'inventory_product');
    }
}
