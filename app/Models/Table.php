<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TableLocation;

class Table extends Model
{
    protected $fillable = ['code']; // removed 'status_id' — no longer belongs here

    public function location()
    {
        return $this->hasOneThrough(
            TableLocation::class,
            TableLocationAssignment::class,
            'table_id', // foreign key on assignments
            'id',       // local key on locations
            'id',       // local key on tables
            'table_location_id' // foreign key on assignments
        );
    }
}
