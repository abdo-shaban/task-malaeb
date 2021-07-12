<?php

namespace App\Http\Requests;

use App\Rules\CheckIsValidTimeRule;
use Illuminate\Foundation\Http\FormRequest;

class BookingSlotRequest extends FormRequest
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
            'stadium_pitch_id' => ['required', 'integer', 'min:1', 'exists:stadium_pitches,id'],
            'start_at'         => ['required', 'date', 'bail', 'after_or_equal:today', new CheckIsValidTimeRule()],
            'type'             => ['required', 'in:60,90'],
        ];
    }
}
