<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StadiumPitch extends Model
{
    use HasFactory;

    public function stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class, 'stadium_id', 'id');
    }
}
