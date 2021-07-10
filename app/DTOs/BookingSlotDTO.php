<?php


namespace App\DTOs;


use Spatie\DataTransferObject\DataTransferObject;

class BookingSlotDTO extends DataTransferObject
{
    public int $stadium_pitch_id;
    public string $start_at;
    public int $type;
}
