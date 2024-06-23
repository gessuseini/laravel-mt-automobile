<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name',
        'website_logo',
        'website_icon',
        'website_phone_number',
        'website_domain',
        'website_contact_address',
        'website_email',
        'website_facebook',
        'website_instagram',
        'website_twitter',
        'website_linkedin',
        'website_theme_color',
    ];
}
