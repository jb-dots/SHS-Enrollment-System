<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrandsController extends Controller
{
    public function index()
    {
        $strands = [
            ['name' => 'Accountancy, Business and Management (ABM)', 'track' => 'Academic Track'],
            ['name' => 'Humanities and Social Sciences (HUMSS)', 'track' => 'Academic Track'],
            ['name' => 'Science, Technology, Engineering, and Mathematics (STEM)', 'track' => 'Academic Track'],
            ['name' => 'General Academic Strand (GAS)', 'track' => 'Academic Track'],
            ['name' => 'Visual and Media Arts', 'track' => 'Arts and Design Track'],
            ['name' => 'Performative Arts', 'track' => 'Arts and Design Track'],
            ['name' => 'Agri-Fishery Arts (AFA)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
            ['name' => 'Home Economics (HE)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
            ['name' => 'Industrial Arts (IA)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
            ['name' => 'Information and Communications Technology (ICT)', 'track' => 'Technical-Vocational-Livelihood (TVL)'],
        ];

        return view('strands.index', compact('strands'));
    }
}
