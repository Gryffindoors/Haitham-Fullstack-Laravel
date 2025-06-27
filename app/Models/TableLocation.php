<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use App\Models\TableStatus;

class TableLocation extends Model
{
    protected $fillable = ['location_code', 'capacity', 'status_id', 'is_reserved', 'reserved_from', 'reserved_until', 'reservation_note'];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function status()
    {
        return $this->belongsTo(TableStatus::class, 'status_id');
    }

    public function isReserved(): bool
    {
        return optional($this->status)->status === 'reserved';
    }

    public function markAs($status)
    {
        $statusId = TableStatus::where('status', $status)->value('id');
        if ($statusId) {
            $this->status_id = $statusId;
            $this->save();
        }
    }
}
