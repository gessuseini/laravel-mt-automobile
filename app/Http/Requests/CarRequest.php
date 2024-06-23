<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_brand' => ['required', 'max:100'],
            'vehicle_model' => ['required', 'max:100'],
            'vehicle_transmission' => ['required', 'max:50'],
            'vehicle_mileage' => ['required', 'numeric'],
            'vehicle_year' => ['required', 'numeric'],
            'vehicle_image' => ['nullable', 'image'],
            'vehicle_price' => ['required', 'numeric'],
            'vehicle_description' => ['nullable', 'string']
        ];
    }
}
