<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\MenuItem;
use App\Models\Staff;

class Inventory extends Model
{
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(Staff::class, 'created_by');
    }
}
