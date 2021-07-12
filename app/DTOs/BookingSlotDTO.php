<?php


namespace App\DTOs;


use Spatie\DataTransferObject\DataTransferObject;

class BookingSlotDTO extends DataTransferObject
{
    /**
     * @var int|string $stadium_pitch_id
     */
    public $stadium_pitch_id;
    public string $start_at;
    public string $type;
}
