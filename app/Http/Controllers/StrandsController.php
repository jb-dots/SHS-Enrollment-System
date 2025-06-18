<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrandsController extends Controller
{
    private $strands = [
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

    public function index()
    {
        $strands = $this->strands;
        return view('strands.index', compact('strands'));
    }

    public function create()
    {
        return view('strands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'track' => 'required|string|max:255',
        ]);

        $this->strands[] = [
            'name' => $validated['name'],
            'track' => $validated['track'],
        ];

        return redirect()->route('strands.index')->with('success', 'Strand created successfully.');
    }

    public function edit($id)
    {
        if (!isset($this->strands[$id])) {
            abort(404);
        }
        $strand = $this->strands[$id];
        return view('strands.edit', compact('strand', 'id'));
    }

    public function update(Request $request, $id)
    {
        if (!isset($this->strands[$id])) {
            abort(404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'track' => 'required|string|max:255',
        ]);

        $this->strands[$id] = [
            'name' => $validated['name'],
            'track' => $validated['track'],
        ];

        return redirect()->route('strands.index')->with('success', 'Strand updated successfully.');
    }

    public function destroy($id)
    {
        if (!isset($this->strands[$id])) {
            abort(404);
        }
        array_splice($this->strands, $id, 1);
        return redirect()->route('strands.index')->with('success', 'Strand deleted successfully.');
    }
}
