<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Room extends Model
{
    use HasFactory;
    function roomtype()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

}
