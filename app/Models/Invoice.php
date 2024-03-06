<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id',
        'purchase_order_id',
        'invoice_number', // Added for unique invoice identification
        'amount',
        'invoice_date',
        'due_date',
        'status', // For tracking invoice status
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'invoice_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    /**
     * Define relationships
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function lineItems()
    {
        return $this->hasMany(LineItem::class);
    }

    /**
     * Calculate the total amount of the invoice.
     */
    public function getTotal()
    {
        return $this->lineItems->sum('price');
    }

    /**
     * Determine if the invoice is overdue.
     */
    public function isOverdue()
    {
        return now()->gt($this->due_date);
    }

    /**
     * Boot the model (for adding validation, observers, etc.)
     */
    public function validate()
    {
        static::creating(function ($invoice) {
            $invoice->invoice_number = 'INV-' . str_pad($invoice->id, 8, '0', STR_PAD_LEFT); // Auto-generate invoice number

            $invoice->validate([
                'vendor_id' => 'required|exists:vendors,id',
                'purchase_order_id' => 'required|exists:purchase_orders,id',
                'invoice_number' => 'required|unique:invoices',
                'amount' => 'required|numeric|min:0',
                'invoice_date' => 'required|date',
                'due_date' => 'required|date|after_or_equal:invoice_date',
                'status' => ['required', Rule::in(['draft', 'sent', 'paid', 'overdue'])]
            ]);
        });
    }
}
