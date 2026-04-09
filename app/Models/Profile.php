<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'name',
        'title',
        'tagline',
        'bio',
        'location',
        'github_url',
        'linkedin_url',
        'image',
        'favicon',
        'linktree_url',
        'email',
        'phone',
    ];
}
