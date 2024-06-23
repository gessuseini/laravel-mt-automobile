<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'reservation_date' => ['required', 'date'],
            'reservation_type' => ['required', 'string'],
            'reservation_brand' => ['required', 'string'],
            'reservation_model' => ['required', 'string'],
            'reservation_vin_num' => ['required', 'string'],
            'reservation_mileage' => ['required', 'numeric'],
            'reservation_plate_number' => ['required', 'string'],
            'reservation_year' => ['required', 'numeric'],
            'reservation_typeApproval' => ['required', 'string'],
            'reservation_description' => ['required', 'string']
        ];
    }
}
