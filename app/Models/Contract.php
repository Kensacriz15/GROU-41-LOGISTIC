<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'bidding_id', 'vendor_id', 'product_id',
        'quantity', 'price', 'delivery_date', 'payment_terms', 'status'
    ];

    public function bidding()
    {
        return $this->belongsTo(Bidding::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
