<?php

namespace App\Http\Controllers;

use App\DTOs\AvailableSlotDTO;
use App\Http\Requests\GetAvailableSlotRequest;
use App\Http\Resources\AvailableSlotResource;
use App\Services\UseCases\AvailableSlotUseCase;

class AvailableSlotController extends Controller
{

    private AvailableSlotUseCase $availableSlotUseCase;

    public function __construct(AvailableSlotUseCase $availableSlotUseCase)
    {
        $this->availableSlotUseCase = $availableSlotUseCase;
    }

    public function __invoke(GetAvailableSlotRequest $request)
    {
        return AvailableSlotResource::collection($this->availableSlotUseCase->getAvailability(new AvailableSlotDTO($request->validated())));
    }

}
