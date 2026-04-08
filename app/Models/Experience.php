<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'organization',
        'role',
        'employment_type',
        'location',
        'description',
        'highlights',
        'start_date',
        'end_date',
        'is_current',
        'order',
        'is_visible',
    ];

    protected $casts = [
        'highlights' => 'array',
        'is_current' => 'boolean',
        'is_visible' => 'boolean',
    ];
}
