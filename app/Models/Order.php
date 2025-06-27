<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function bills()
    {
        return $this->belongsToMany(Bill::class, 'bill_orders');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function type()
    {
        return $this->belongsTo(OrderType::class);
    }
}
