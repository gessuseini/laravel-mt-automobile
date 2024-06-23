<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarListResource;
use App\Http\Resources\CarResource;
use App\Models\Api\Car;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CarController extends Controller
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

        $query = Car::query();
        $query->orderBy($sortField, $sortDirection);
        if($search) {
            $query->where('vehicle_model', 'like', "%{$search}%")
                ->orWhere('vehicle_id', 'like', "%{$search}%")
            ->orWhere('vehicle_description', 'like', "%{$search}%")
                ->orWhere('vehicle_mileage', 'like', "%{$search}%")
                ->orWhere('vehicle_price', 'like', "%{$search}%")
                ->orWhere('vehicle_brand', 'like', "%{$search}%")
                ->orWhere('vehicle_transmission', 'like', "%{$search}%")
                ->orWhere('vehicle_year', 'like', "%{$search}%");
        }
        return CarListResource::collection($query->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = $request->user()->id;
        $data['updated_by'] = $request->user()->id;

        $image = $data['vehicle_image'] ?? null;

        if($image) {
            $relativePath = $this->saveImage($image);
            $data['vehicle_image'] = URL::to(Storage::url($relativePath));
            $data['vehicle_image_mime'] = $image->getClientMimeType();
            $data['vehicle_image_size'] = $image->getSize();
        }

        $car = Car::create($data);

        return new CarResource($car);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car      $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;

        /** @var \Illuminate\Http\UploadedFile $image */
        $image = $data['vehicle_image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['vehicle_image'] = URL::to(Storage::url($relativePath));
            $data['vehicle_image_mime'] = $image->getClientMimeType();
            $data['vehicle_image_size'] = $image->getSize();

            // If there is an old image, delete it
            if ($car->vehicle_image) {
                Storage::deleteDirectory('/public/' . dirname($car->vehicle_image));
            }
        }

        $car->update($data);

        return new CarResource($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response()->noContent();
    }

    private function saveImage(UploadedFile $image)
    {
        $path = 'images/' . Str::random();
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0755, true);
        }
        if (!Storage::putFileAS('public/' . $path, $image, $image->getClientOriginalName())) {
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }

        return $path . '/' . $image->getClientOriginalName();
    }
}
