<?php


namespace App\Services\UseCases;


use App\DTOs\AvailableSlotDTO;
use App\Services\BookingSlotsService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class AvailableSlotUseCase
{

    private BookingSlotsService $bookingSlotsService;

    public function __construct(BookingSlotsService $bookingSlotsService)
    {
        $this->bookingSlotsService = $bookingSlotsService;
    }

    public function getAvailability(AvailableSlotDTO $availableSlotDTO): Collection
    {
        $allSlotsBookedOnDay = $this->bookingSlotsService->getAllBookedSlotsOnDay($availableSlotDTO->day, $availableSlotDTO->stadium_pitch_id);


        $slots = CarbonPeriod::since($availableSlotDTO->day)->minutes($availableSlotDTO->type)->end(Carbon::make($availableSlotDTO->day)->endOfDay())->toArray();
        return collect($slots)
            ->map(function ($slot) use ($availableSlotDTO) {
                return [
                    'start_at'         => $slot->toDateTimeString(),
                    'end_at'           => $slot->addMinutes($availableSlotDTO->type)->toDateTimeString(),
                    'stadium_pitch_id' => $availableSlotDTO->stadium_pitch_id,
                    'type'             => $availableSlotDTO->type,
                ];
            })
            ->filter(function ($slot) use ($allSlotsBookedOnDay) {
                return $allSlotsBookedOnDay
                        ->where('start_at', '<', $slot['end_at'])
                        ->where('end_at', '>', $slot['start_at'])
                        ->count() === 0;
            });
    }
}
