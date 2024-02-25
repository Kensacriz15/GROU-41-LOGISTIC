<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description', 'starting_price'];

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
}
