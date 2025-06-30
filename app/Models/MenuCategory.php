<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\MenuItem;

class MenuCategory extends Model
{
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuCategory::class, 'parent_id');
    }
}
