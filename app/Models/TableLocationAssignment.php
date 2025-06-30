<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use App\Models\TableLocation;

class TableLocationAssignment extends Model
{
    protected $table = 'table_location_assignments';
    protected $fillable = ['table_id', 'table_location_id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function location()
    {
        return $this->belongsTo(TableLocation::class, 'table_location_id');
    }
}
