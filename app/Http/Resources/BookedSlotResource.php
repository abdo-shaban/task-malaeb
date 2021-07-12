<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookedSlotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'stadium_pitch_id' => $this->stadium_pitch_id,
            'start_at'         => $this->start_at,
            'end_at'           => $this->end_at,
            'type'             => $this->type,
            'updated_at'       => $this->updated_at,
            'created_at'       => $this->created_at,
        ];
    }
}
