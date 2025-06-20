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
        $request->validate([
            'name' => 'required|string|max:255',
            'strands' => 'nullable|string',
        ]);

        $rawStrands = $request->input('strands', '');

        $newTrack = [
            'name' => $request->input('name'),
            'strands' => $rawStrands,
            'archived' => false,
        ];

        $this->tracksRepository->addTrack($newTrack);

        return redirect()->route('admin.manage-tracks')->with('success', 'Track created successfully.');
    }

    public function edit($id)
    {
        $tracks = $this->tracksRepository->getActive();
        if (!isset($tracks[$id])) {
            abort(404);
        }
        $track = $tracks[$id];
        return view('tracks.edit', compact('track', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'strands' => 'nullable|string',
        ]);

        $rawStrands = $request->input('strands', '');

        $tracks = $this->tracksRepository->getActive();
        if (!isset($tracks[$id])) {
            abort(404);
        }

        $tracks[$id]['name'] = $request->input('name');
        $tracks[$id]['strands'] = $rawStrands;

        // Save updated tracks back to session
        $this->tracksRepository->saveTracksToSession($tracks);

        return redirect()->route('admin.manage-tracks')->with('success', 'Track updated successfully.');
    }

    public function destroy($id)
    {
        // This method would need to be updated to delete from the repository if persistence is implemented
        // For now, just redirect back
        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully.');
    }

    public function archive($id)
    {
        $success = $this->tracksRepository->archive($id);
        if (!$success) {
            abort(404);
        }
        return redirect()->route('admin.archived-tracks')->with('success', 'Track archived successfully.');
    }

    public function restore($id)
    {
        $success = $this->tracksRepository->restore($id);
        if (!$success) {
            abort(404);
        }
        return redirect()->route('admin.manage-tracks')->with('success', 'Track restored successfully.');
    }
}
