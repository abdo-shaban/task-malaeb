<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAvailableSlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'day'              => ['required', 'date', 'after_or_equal:today'],
            'type'             => ['required', 'in:60,90'],
            'stadium_pitch_id' => ['required', 'integer', 'min:1', 'exists:stadium_pitches,id'],
        ];
    }
}
