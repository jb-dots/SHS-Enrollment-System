<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    protected $fillable = [
        'name',
        'track_id',
        'description',
        'archived',
    ];

    protected $casts = [
        'archived' => 'boolean',
    ];

    /**
     * Get the track that owns the strand.
     */
    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
