<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_category_id','description', 'production_date', 'expiration_date','unit_price', 'image_path'];

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
public function getImageUrlAttribute()
{
    if ($this->image_path) {
        return asset('storage/product_images/' . $this->image_path); // Return the actual image path
    } else {
        return asset('storage/product_images/default.jpg'); // Placeholder if no image was uploaded
    }
}
public function product_category()
{
    return $this->belongsTo(ProductCategory::class);
}
}

