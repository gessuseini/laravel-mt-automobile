<?php

namespace App\Http\Controllers;

use App\Models\BookingReservation;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewReservation;

class ReservationController extends Controller
{
    public function index()
    {
        $customer = Auth::user();
        $reservations = $customer->reservations;

        return view('dashboard.appointments', compact('reservations'));
    }

    public function create()
    {
        return view('make-appointment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_date' => ['required', 'string'],
            'reservation_type' => ['required', 'array'],
            'reservation_brand' => ['required', 'string'],
            'reservation_model' => ['required', 'string'],
            'reservation_vin_num' => ['required', 'string'],
            'reservation_mileage' => ['required', 'numeric'],
            'reservation_plate_number' => ['required', 'string'],
            'reservation_year' => ['required', 'numeric'],
            'reservation_typeApproval' => ['required', 'string'],
            'reservation_description' => ['required', 'string'],
        ]);

        $reservation = new BookingReservation();
        $reservation->user_id = Auth::user()->id; // Set the user_id foreign key
        $reservation->reservation_date = $request['reservation_date'];
        $reservation->reservation_type = $request['reservation_type'];
        $reservation->reservation_brand = $request['reservation_brand'];
        $reservation->reservation_model = $request['reservation_model'];
        $reservation->reservation_vin_num = $request['reservation_vin_num'];
        $reservation->reservation_mileage = $request['reservation_mileage'];
        $reservation->reservation_plate_number = $request['reservation_plate_number'];
        $reservation->reservation_year = $request['reservation_year'];
        $reservation->reservation_typeApproval = $request['reservation_typeApproval'];
        $reservation->reservation_description = $request['reservation_description'];
        $reservation->save();

        $adminUsers = User::where('is_admin', true)->get();
        Notification::sendNow($adminUsers, new NewReservation($reservation->reservation_date, $reservation->reservation_type));

        return redirect()->route('appointments');
    }

}
