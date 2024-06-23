<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'reservation_id' => $this->reservation_id,
            'reservation_type' => $this->reservation_type,
            'reservation_date' => $this->reservation_date,
            'reservation_time' => $this->reservation_time,
            'reservation_brand' => $this->reservation_brand,
            'reservation_model' => $this->reservation_model,
            'reservation_vin_num' => $this->reservation_vin_num,
            'reservation_mileage' => $this->reservation_mileage,
            'reservation_plate_number' => $this->reservation_plate_number,
            'reservation_year' => $this->reservation_year,
            'reservation_typeApproval' => $this->reservation_typeApproval,
            'reservation_description' => $this->reservation_description,
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'phone_number' => $this->user->customer->phone_number,

        ];
    }
}
