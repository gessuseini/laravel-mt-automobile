<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\CarController::class, 'latestCars']);

Route::get('/car/{car:vehicle_slug}', [\App\Http\Controllers\CarController::class, 'view'])->name('car.view');

Route::get('/our-services', function () {
    return view('our-services');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/our-team', function () {
    return view('our-team');
});

Route::get('/cars', [\App\Http\Controllers\CarController::class, 'index']);

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'updatePhone'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard.main');
    })->name('dashboard');
    Route::get('/appointments', [ReservationController::class, 'index'] )->name('appointments');
    Route::get('/make-appointment', [ReservationController::class, 'create'])->name('make-appointment');
    Route::post('/make-appointment', [ReservationController::class, 'store'])->name('store-appointment');


});

require __DIR__.'/auth.php';
