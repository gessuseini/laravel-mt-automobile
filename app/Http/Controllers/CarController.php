<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::query()->orderBy('updated_at', 'desc')->paginate(5);
        return view('car.index', [
            'cars' => $cars
        ]);
    }

    public function latestCars()
    {
        $cars = Car::query()->orderBy('created_at', 'desc')->paginate(5);
        return view('welcome', [
            'cars' => $cars
        ]);
    }

    public function view(Car $car)
    {
        return view('car.view', ['car' => $car]);
    }
}
