<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    use HasFactory;

    protected $table = 'stadiums';

    public function pitches(): HasMany
    {
        return $this->hasMany(StadiumPitch::class, 'stadium_id', 'id');
    }
}
