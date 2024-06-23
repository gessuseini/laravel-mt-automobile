<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::query()->orderBy('updated_at', 'desc')->paginate(5);
        return view('newsletter.index', [
            'newsletters' => $newsletters
        ]);
    }

    public function view(Newsletter $newsletter)
    {
        return view('newsletter.view', ['newsletter' => $newsletter]);
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
