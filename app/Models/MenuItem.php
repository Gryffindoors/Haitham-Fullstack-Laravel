<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class MenuItem extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'description',
        'description_ar',
        'price',
        'category_id',
        'image_url'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getImageUrlAttribute($value)
    {
        return $value ? asset($value) : null;
    }
    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }
}
