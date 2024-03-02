<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'unit_price'];

    public function biddings()
    {
        return $this->hasMany(Bidding::class);
    }

    public function currentBid()
    {
        return $this->biddings()
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function totalValueInStock($inventoryId)
    {
        $quantity = $this->inventories()
            ->where('inventory_id', $inventoryId)
            ->first()
            ->pivot
            ->quantity;

        return $quantity * $this->unit_price;
    }

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'inventory_product')
                    ->withPivot('quantity', 'reorder_level');
                    $product->inventories()->detach($inventoryId);
    }

    public function productInventories()
    {
        return $this->belongsToMany(ProductInventory::class, 'inventory_product')
            ->using(ProductInventory::class)
            ->withPivot('quantity', 'reorder_level');
    }
    public function scopePublicProducts($query)
{
    return $query->where('public', true);
}
}
