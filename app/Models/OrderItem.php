<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\MenuItem;

class OrderItem extends Model
{
    //connections
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
    
    //calculations

}
