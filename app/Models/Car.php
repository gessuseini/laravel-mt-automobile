<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Car extends Model
{
    public $table = "vehicle_marketplace";

    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected $fillable = ['vehicle_brand', 'vehicle_model', 'vehicle_mileage', 'vehicle_transmission', 'vehicle_year', 'vehicle_image', 'vehicle_description', 'vehicle_price', 'vehicle_image_mime', 'vehicle_image_size', 'created_by', 'updated_by'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['vehicle_brand', 'vehicle_model'])
            ->saveSlugsTo('vehicle_slug');
    }

    public function getRouteKeyName()
    {
        return 'vehicle_slug';
    }
}
