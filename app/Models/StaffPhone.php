<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffPhone extends Model
{
    protected $table = 'staff_phones';
    protected $fillable = ['staff_id', 'phone_number'];
    public $timestamps = true;

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
