<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::query()->orderBy('updated_at', 'desc')->paginate(5);
        return view('subscriber.index', [
            'subscribers' => $subscribers
        ]);
    }

    public function view(Subscriber $subscriber)
    {
        return view('subscriber.view', ['subscriber' => $subscriber]);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return redirect()->route('thankyou')->with('success', 'Thank you for subscribing!');
    }
}
