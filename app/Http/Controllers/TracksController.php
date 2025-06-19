<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TracksController extends Controller
{
    private $tracks = [
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

    public function index()
    {
        $tracks = array_filter($this->tracks, function ($track) {
            return empty($track['archived']) || $track['archived'] === false;
        });
        return view('tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('tracks.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new track (for now, just simulate)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'strands' => 'nullable|array',
            'strands.*' => 'string|max:255',
        ]);

        // Add to tracks array (simulate database)
        $this->tracks[] = [
            'name' => $validated['name'],
            'strands' => $validated['strands'] ?? [],
        ];

        return redirect()->route('tracks.index')->with('success', 'Track created successfully.');
    }

    public function edit($id)
    {
        if (!isset($this->tracks[$id])) {
            abort(404);
        }
        $track = $this->tracks[$id];
        return view('tracks.edit', compact('track', 'id'));
    }

    public function update(Request $request, $id)
    {
        if (!isset($this->tracks[$id])) {
            abort(404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'strands' => 'nullable|array',
            'strands.*' => 'string|max:255',
        ]);

        $this->tracks[$id] = [
            'name' => $validated['name'],
            'strands' => $validated['strands'] ?? [],
        ];

        return redirect()->route('tracks.index')->with('success', 'Track updated successfully.');
    }

    public function destroy($id)
    {
        if (!isset($this->tracks[$id])) {
            abort(404);
        }
        array_splice($this->tracks, $id, 1);
        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully.');
    }

    public function archive($id)
    {
        if (!isset($this->tracks[$id])) {
            abort(404);
        }
        $this->tracks[$id]['archived'] = true;
        return redirect()->route('tracks.index')->with('success', 'Track archived successfully.');
    }
}
