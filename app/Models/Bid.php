<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
  protected $fillable = ['bidding_id', 'vendor_id', 'price', 'delivery_time', 'terms_and_conditions'];

  public function bidding()
  {
    return $this->belongsTo(Bidding::class);
  }

  public function vendor()
  {
    return $this->belongsTo(Vendor::class);
  }
}
