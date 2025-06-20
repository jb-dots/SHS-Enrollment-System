<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;

class TracksRepository
{
    private $defaultTracks = [
        [
            'name' => 'Academic Track',
            'strands' => [
                'Accountancy, Business and Management (ABM)',
                'Humanities and Social Sciences (HUMSS)',
                'Science, Technology, Engineering, and Mathematics (STEM)',
                'General Academic Strand (GAS)',
            ],
            'archived' => false,
        ],
        [
            'name' => 'Technical-Vocational-Livelihood (TVL)',
            'strands' => [
                'Agri-Fishery Arts (AFA)',
                'Home Economics (HE)',
                'Industrial Arts (IA)',
                'Information and Communications Technology (ICT)',
            ],
            'archived' => false,
        ],
        [
            'name' => 'Arts and Design Track',
            'strands' => [
                'Visual and Media Arts',
                'Performative Arts',
            ],
            'archived' => false,
        ],
    ];

    private function getTracksFromSession()
    {
        if (!Session::has('tracks')) {
            Session::put('tracks', $this->defaultTracks);
        }
        return Session::get('tracks');
    }

    public function saveTracksToSession($tracks)
    {
        Session::put('tracks', $tracks);
    }

    public function getAll()
    {
        return $this->getTracksFromSession();
    }

    public function getActive()
    {
        $tracks = $this->getTracksFromSession();
        return array_filter($tracks, function ($track) {
            return empty($track['archived']) || $track['archived'] === false;
        });
    }

    public function getArchived()
    {
        $tracks = $this->getTracksFromSession();
        return array_filter($tracks, function ($track) {
            return !empty($track['archived']) && $track['archived'] === true;
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function archive($index)
    {
        $tracks = $this->getTracksFromSession();
        if (!isset($tracks[$index])) {
            return false;
        }
        $tracks[$index]['archived'] = true;
        $this->saveTracksToSession($tracks);
        return true;
    }

    public function restore($index)
    {
        $tracks = $this->getTracksFromSession();
        if (!isset($tracks[$index])) {
            return false;
        }
        $tracks[$index]['archived'] = false;
        $this->saveTracksToSession($tracks);
        return true;
    }

    public function addTrack(array $track)
    {
        $tracks = $this->getTracksFromSession();
        $tracks[] = $track;
        $this->saveTracksToSession($tracks);
    }
}
