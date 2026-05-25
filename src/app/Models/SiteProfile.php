<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteProfile extends Model
{
    protected $fillable = [
        'site_name',
        'hero_subtitle',
        'hero_title',
        'hero_description',
        'hero_button_text',
        'about_title',
        'about_image',
        'about_heading',
        'about_description_1',
        'about_description_2',
        'about_description_3',
        'skills',
    ];

    protected $casts = [
        'skills' => 'array',
    ];
}
