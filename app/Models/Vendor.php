<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
  protected $fillable = ['name', 'email', 'contact_name', 'phone', 'address', 'website'];

  public function bids()
  {
    return $this->hasMany(Bid::class);
  }
}
