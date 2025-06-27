<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Staff;
use App\Models\TimeTable;

class Attendance extends Model
{
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function timetable()
    {
        return $this->belongsTo(TimeTable::class);
    }
}

