<?php


namespace App\DTOs;


use Spatie\DataTransferObject\DataTransferObject;

class AvailableSlotDTO extends DataTransferObject
{
    public int $stadium_pitch_id;
    public string $day;
    public string $type;
}
