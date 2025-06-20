<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Strand;

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

    /**
     * Get the strands for the track.
     */
    public function strands()
    {
        return $this->hasMany(Strand::class);
    }
}
