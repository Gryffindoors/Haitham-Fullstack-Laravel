<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\MenuItem;
use App\Models\Bill;
 
class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'menu_item_id',
        'quantity',
        'unit_price',
        'total_price',
        'bill_id', // if you're associating with bills directly
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    // Optional: Accessors or helpers for calculations
    public function getLineTotalAttribute()
    {
        return $this->quantity * $this->unit_price;
    }

    // Example: future tax or discount logic (can remove if not needed yet)
    public function calculateTotalWithTax($taxRate = 0)
    {
        $subtotal = $this->quantity * $this->unit_price;
        return $subtotal + ($subtotal * $taxRate);
    }
}
