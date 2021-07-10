<?php


namespace App\Services;


use App\DTOs\BookingSlotDTO;
use App\Models\Slot;
use Illuminate\Support\Carbon;

class BookingSlotsService
{

    private Slot $slot;

    public function __construct(Slot $slot)
    {
        $this->slot = $slot;
    }

    public function book(BookingSlotDTO $bookingSlotDTO): Slot
    {
        $this->slot->stadium_pitch_id = $bookingSlotDTO->stadium_pitch_id;
        $this->slot->start_at = $bookingSlotDTO->start_at;
        $this->slot->end_at = Carbon::make($bookingSlotDTO->start_at)->addMinutes($bookingSlotDTO->type);
        $this->slot->type = $bookingSlotDTO->type;
        $this->slot->save();

        return $this->slot;
    }
}
