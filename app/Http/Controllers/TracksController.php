<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TracksRepository;

class TracksController extends Controller
{
    protected $tracksRepository;

    public function __construct(TracksRepository $tracksRepository)
    {
        $this->tracksRepository = $tracksRepository;
    }

    public function index()
    {
        $tracks = $this->tracksRepository->getActive();
        return view('tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('tracks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'strands' => 'nullable|string',
        ]);

        // Save strands as raw HTML string from TinyMCE
        $this->tracksRepository->addTrack([
            'name' => $validated['name'],
            'strands' => $validated['strands'] ?? '',
            'archived' => false,
        ]);

        return redirect()->route('admin.manage-tracks')->with('success', 'Track created successfully.');
    }

    public function edit($id)
    {
        $track = $this->tracksRepository->getAll()->find($id);
        if (!$track) {
            abort(404);
        }
        return view('tracks.edit', compact('track', 'id'));
    }

    public function update(Request $request, $id)
    {
        $track = $this->tracksRepository->getAll()->find($id);
        if (!$track) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'strands' => 'nullable|string',
        ]);

        // Save strands as raw HTML string from TinyMCE
        $track->name = $validated['name'];
        $track->strands = $validated['strands'] ?? '';
        $track->save();

        return redirect()->route('admin.manage-tracks')->with('success', 'Track updated successfully.');
    }

    public function archive($id)
    {
        $this->tracksRepository->archive($id);
        return redirect()->route('admin.archived-tracks')->with('success', 'Track archived successfully.');
    }

    public function restore($id)
    {
        $this->tracksRepository->restore($id);
        return redirect()->route('admin.archived-tracks')->with('success', 'Track restored successfully.');
    }
}
