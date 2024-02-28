<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'quantity',
        'delivery_date',
    ];
    protected $casts = [
        'delivery_date' => 'datetime',
    ];
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
