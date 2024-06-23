<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    public $table = "booking_reservations";

    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['reservation_date', 'reservation_time', 'reservation_type', 'reservation_brand', 'reservation_model', 'reservation_date', 'reservation_vin_num', 'reservation_date', 'reservation_mileage', 'reservation_plate_number', 'reservation_year', 'reservation_typeApproval', 'reservation_description', 'created_by', 'updated_by'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}

