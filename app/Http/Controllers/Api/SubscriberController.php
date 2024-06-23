<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberListResource;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;

class SubscriberController extends Controller
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

        $query = Subscriber::query();
        $query->orderBy($sortField, $sortDirection);
        if ($search) {
            $query->where('email', 'like', "%{$search}%");
        }
        return SubscriberListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
            // add other validation rules as necessary
        ]);
        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $subscriber = Subscriber::create($data);

        return new SubscriberResource($subscriber);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        return new SubscriberResource($subscriber);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email,' . $subscriber->id,
            // add other validation rules as necessary
        ]);
        $data['updated_by'] = $request->user()->id;

        $subscriber->update($data);

        return new SubscriberResource($subscriber);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return response()->noContent();
    }
}
