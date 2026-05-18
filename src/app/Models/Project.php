<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'erd_image',
        'flowchart_image',
        'demo_url',
        'github_url',
        'technologies',
        'is_published',
        ];

    protected $casts = [
        'technologies' => 'array',
        'is_published' => 'boolean',
    ];
}
