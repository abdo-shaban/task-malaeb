<?php

namespace App\Http\Controllers;

use App\DTOs\BookingSlotDTO;
use App\Http\Requests\BookingSlotRequest;
use App\Http\Requests\GetAvailableSlotRequest;
use App\Services\BookingSlotsService;

class SlotController extends Controller
{

    private BookingSlotsService $bookingSlotsService;

    public function __construct(BookingSlotsService $bookingSlotsService)
    {
        $this->bookingSlotsService = $bookingSlotsService;
    }

    public function available(GetAvailableSlotRequest $request)
    {
        //
    }


    public function store(BookingSlotRequest $request)
    {
        dd($this->bookingSlotsService->book(new BookingSlotDTO($request->validated())));
    }

}
