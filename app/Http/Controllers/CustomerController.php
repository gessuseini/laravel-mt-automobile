<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function show($customerId)
    {
        $customer = Customer::with('reservations')->findOrFail($customerId);
        return view('appointments', compact('customer'));
    }

    public function update(CustomerUpdateRequest $request): RedirectResponse
    {
        $request->customer()->fill($request->validated());


        $request->customer()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
