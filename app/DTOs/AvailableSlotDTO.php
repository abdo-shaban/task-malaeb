<?php


namespace App\DTOs;


use Spatie\DataTransferObject\DataTransferObject;

class AvailableSlotDTO extends DataTransferObject
{
    /**
     * @var int|string $stadium_pitch_id
     */
    public $stadium_pitch_id;
    public string $day;
    public string $type;
}
