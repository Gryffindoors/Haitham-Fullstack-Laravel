<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;

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
    return $this->belongsTo(OrderType::class, 'order_type_id');
}


    protected $fillable = [
        'customer_id',
        'order_type_id',
        'table_id',
        'status_id',
        'ordered_at',
        'created_by',
        'total',
    ];
}
