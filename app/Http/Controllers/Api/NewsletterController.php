<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Http\Resources\NewsletterListResource;
use App\Http\Resources\NewsletterResource;
use App\Mail\NewsletterMail;
use App\Models\Api\Newsletter;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
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

        $query = Newsletter::query();
        $query->orderBy($sortField, $sortDirection);
        if($search) {
            $query->where('title', 'like', "%{$search}%");
        }
        return NewsletterListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsletterRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $newsletter = Newsletter::create($data);

        return new NewsletterResource($newsletter);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Newsletter $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        return new NewsletterResource($newsletter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Newsletter      $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(NewsletterRequest $request, Newsletter $newsletter)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;

        $newsletter->update($data);

        return new NewsletterResource($newsletter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Newsletter $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return response()->noContent();
    }

    public function send(Request $request, Newsletter $newsletter)
    {
        // Get the subscribers
        $subscribers = Subscriber::all();

        // Send the newsletter to each subscriber
        foreach ($subscribers as $subscriber) {
            // Send email using NewsletterMail Mailable
            Mail::to($subscriber->email)->send(new NewsletterMail($newsletter));
        }

        // Return a response indicating success or failure
        return response()->json(['message' => 'Newsletter sent to all subscribers'], 200);
    }
}
