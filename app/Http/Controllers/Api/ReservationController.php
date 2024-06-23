<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationListResource;
use App\Http\Resources\ReservationResource;
use App\Models\Api\Reservation;
use App\Models\BookingReservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Reservation::query()->with(['user', 'user.customer']);
        $query->orderBy($sortField, $sortDirection);
        if ($search) {
            $query->where('reservation_model', 'like', "%{$search}%")
                ->orWhere('reservation_date', 'like', "%{$search}%")
                ->orWhere('reservation_id', 'like', "%{$search}%")
                ->orWhere('reservation_description', 'like', "%{$search}%")
                ->orWhere('reservation_mileage', 'like', "%{$search}%")
                ->orWhere('reservation_brand', 'like', "%{$search}%")
                ->orWhere('reservation_year', 'like', "%{$search}%");
        }
        return ReservationListResource::collection($query->paginate($perPage));
    }

    /** Show today's reservations only **/
    public function showTodaysReservations()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Reservation::query()->with(['user', 'user.customer']);
        $query->orderBy($sortField, $sortDirection);
        $query->whereDate('reservation_date', '=', now()->toDateString()); // Filter for today's reservations

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('reservation_model', 'like', "%{$search}%")
                    ->orWhere('reservation_date', 'like', "%{$search}%")
                    ->orWhere('reservation_id', 'like', "%{$search}%")
                    ->orWhere('reservation_description', 'like', "%{$search}%")
                    ->orWhere('reservation_mileage', 'like', "%{$search}%")
                    ->orWhere('reservation_brand', 'like', "%{$search}%")
                    ->orWhere('reservation_year', 'like', "%{$search}%");
            });
        }

        return ReservationListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $reservation = BookingReservation::create($data);

        return new ReservationResource($reservation);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BookingReservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(BookingReservation $reservation)
    {
        return new ReservationResource($reservation);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BookingReservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingReservation $reservation)
    {
        $reservation->delete();

        return response()->noContent();
    }
}

