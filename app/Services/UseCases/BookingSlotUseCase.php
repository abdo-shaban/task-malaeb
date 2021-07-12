<?php


namespace App\Services\UseCases;


use App\DTOs\BookingSlotDTO;
use App\Exceptions\GlobalException;
use App\Models\Slot;
use App\Services\BookingSlotsService;

class BookingSlotUseCase
{

    private BookingSlotsService $bookingSlotsService;

    public function __construct(BookingSlotsService $bookingSlotsService)
    {
        $this->bookingSlotsService = $bookingSlotsService;
    }

    public function book(BookingSlotDTO $bookingSlotDTO): Slot
    {
        // TODO check is available
        if (!$this->bookingSlotsService->isAvailableSlot($bookingSlotDTO)) {
            throw new GlobalException('not available slot');
        }

        return $this->bookingSlotsService->book($bookingSlotDTO);
    }
}
