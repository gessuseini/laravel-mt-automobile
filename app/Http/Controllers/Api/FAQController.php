<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Http\Resources\FAQListResource;
use App\Http\Resources\FAQResource;
use App\Models\FAQ;

class FAQController extends Controller
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

        $query = FAQ::query();
        $query->orderBy($sortField, $sortDirection);
        if($search) {
            $query->where('question', 'like', "%{$search}%");
        }
        return FAQListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FAQRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $faq = FAQ::create($data);

        return new FAQResource($faq);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FAQ $faq
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        return new FAQResource($faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FAQ      $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, FAQ $faq)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;

        $faq->update($data);

        return new FAQResource($faq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FAQ $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return response()->noContent();
    }
}
