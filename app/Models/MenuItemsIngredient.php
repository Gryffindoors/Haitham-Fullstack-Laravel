<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\MenuItem;

class MenuItemsIngredient extends Model
{
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    protected $table = 'menu_items_ingredients';
}
