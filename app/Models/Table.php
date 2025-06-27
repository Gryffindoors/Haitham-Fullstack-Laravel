<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TableLocation;

class Table extends Model
{
    protected $fillable = ['code']; // removed 'status_id' — no longer belongs here

    public function location()
    {
        return $this->belongsTo(TableLocation::class);
    }
}
