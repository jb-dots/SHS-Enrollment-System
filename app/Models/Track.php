<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'name',
        'strands',
        'archived',
    ];

    protected $casts = [
        'archived' => 'boolean',
        // Removed strands cast to array to support raw HTML from TinyMCE
    ];
}
