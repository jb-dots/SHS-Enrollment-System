<?php

namespace App\Repositories;

use App\Models\Track;

class TracksRepository
{
    public function getAll()
    {
        return Track::all();
    }

    public function getActive()
    {
        return Track::where('archived', false)->get();
    }

    public function getArchived()
    {
        return Track::where('archived', true)->get();
    }

    public function archive($id)
    {
        $track = Track::find($id);
        if (!$track) {
            return false;
        }
        $track->archived = true;
        $track->save();
        return true;
    }

    public function restore($id)
    {
        $track = Track::find($id);
        if (!$track) {
            return false;
        }
        $track->archived = false;
        $track->save();
        return true;
    }

    public function addTrack(array $data)
    {
        return Track::create($data);
    }

    // Debug method to get all tracks from database
    public function getTracksSessionData()
    {
        return Track::all();
    }
}
