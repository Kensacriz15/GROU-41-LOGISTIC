<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winning extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'winning_bids'; // Adjust to your actual table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bid_id',
        'product_id',
        // ... add other fields from your winning_bids table ...
    ];

    /**
     * Relationship with Bid Model (Optional)
     */
    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }
}
