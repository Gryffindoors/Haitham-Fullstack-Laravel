<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TableLocation;

class TableStatus extends Model
{
    protected $fillable = ['status', 'status_ar'];

    public function locations()
    {
        return $this->hasMany(TableLocation::class, 'status_id');
    }
}
