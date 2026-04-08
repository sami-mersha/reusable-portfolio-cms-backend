<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'problem',
        'solution',
        'tech_stack',
        'features',
        'is_featured',
        'status',
        'image',
        'github_url',
        'live_url',
    ];

    // app/Models/Project.php
    protected $casts = [
        'tech_stack' => 'array',
        'features' => 'array',
    ];
}
