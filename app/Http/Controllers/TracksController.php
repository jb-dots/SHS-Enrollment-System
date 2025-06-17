<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TracksController extends Controller
{
    public function index()
    {
        $tracks = [
            [
                'name' => 'Academic Track',
                'strands' => [
                    'Accountancy, Business and Management (ABM)',
                    'Humanities and Social Sciences (HUMSS)',
                    'Science, Technology, Engineering, and Mathematics (STEM)',
                    'General Academic Strand (GAS)',
                ],
            ],
            [
                'name' => 'Technical-Vocational-Livelihood (TVL)',
                'strands' => [
                    'Agri-Fishery Arts (AFA)',
                    'Home Economics (HE)',
                    'Industrial Arts (IA)',
                    'Information and Communications Technology (ICT)',
                ],
            ],
            [
                'name' => 'Arts and Design Track',
                'strands' => [
                    'Visual and Media Arts',
                    'Performative Arts',
                ],
            ],
        ];

        return view('tracks.index', compact('tracks'));
    }
}
