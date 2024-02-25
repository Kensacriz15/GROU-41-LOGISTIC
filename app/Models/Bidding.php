<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
  protected $fillable = ['product_id', 'start_date', 'end_date'];
  protected $dates = ['start_date', 'end_date'];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
  public function bids()
  {
    return $this->hasMany(Bid::class);
  }
}
