<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slot extends Model
{
    use HasFactory;

    protected $dates = ['start_at', 'end_at'];


    public function stadiumPitch(): BelongsTo
    {
        $this->belongsTo(StadiumPitch::class, 'stadium_pitch_id', 'id');
    }
}
