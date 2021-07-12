<?php

namespace App\Http\Controllers;

use App\DTOs\BookingSlotDTO;
use App\Http\Requests\BookingSlotRequest;
use App\Http\Resources\BookedSlotResource;
use App\Services\UseCases\BookingSlotUseCase;

class BookSlotController extends Controller
{

    private BookingSlotUseCase $bookingSlotUseCase;

    public function __construct(BookingSlotUseCase $bookingSlotUseCase)
    {
        $this->bookingSlotUseCase = $bookingSlotUseCase;
    }

    public function __invoke(BookingSlotRequest $request)
    {
        return new BookedSlotResource($this->bookingSlotUseCase->book(new BookingSlotDTO($request->validated())));
    }

}
