<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_date',
        'reservation_type',
        'reservation_brand',
        'reservation_model',
        'reservation_vin_num',
        'reservation_mileage',
        'reservation_plate_number',
        'reservation_year',
        'reservation_typeApproval',
        'reservation_description',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'reservation_type' => 'array', // Cast reservation_type as an array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
