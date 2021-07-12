<?php


namespace App\Services;


use App\DTOs\BookingSlotDTO;
use App\Models\Slot;
use Illuminate\Database\Eloquent\Collection;
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

    public function isAvailableSlot(BookingSlotDTO $bookingSlotDTO): bool
    {
        $end_at = Carbon::make($bookingSlotDTO->start_at)->addMinutes($bookingSlotDTO->type);
        return $this->slot->newQuery()
                ->where('stadium_pitch_id', $bookingSlotDTO->stadium_pitch_id)
                ->where('start_at', '<', $end_at)
                ->where('end_at', '>', $bookingSlotDTO->start_at)
                ->count() === 0;
    }

    public function getAllBookedSlotsOnDay(string $day, int $stadium_pitch_id): Collection
    {
        return $this->slot->newQuery()
            ->where('stadium_pitch_id', $stadium_pitch_id)
            ->whereDate('start_at', $day)
            ->orderBy('start_at')
            ->get();
    }
}
