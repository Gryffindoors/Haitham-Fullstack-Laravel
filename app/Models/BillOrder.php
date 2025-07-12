<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillOrder extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    protected $fillable = [
        'bill_id',
        'order_id',
    ];
}
