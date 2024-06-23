<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = Cache::remember('faqs', 60, function() {
            return FAQ::first();
        });

        return response()->json($faqs);
    }
}
