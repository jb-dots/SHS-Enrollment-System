<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strand;

class StrandsController extends Controller
{
    public function index()
    {
        $strands = Strand::all();
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

        Strand::create([
            'name' => $validated['name'],
            'track' => $validated['track'],
        ]);

        return redirect()->route('strands.index')->with('success', 'Strand created successfully.');
    }

    public function edit($id)
    {
        $strand = Strand::findOrFail($id);
        return view('strands.edit', compact('strand'));
    }

    public function update(Request $request, $id)
    {
        $strand = Strand::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'track' => 'required|string|max:255',
        ]);

        $strand->update([
            'name' => $validated['name'],
            'track' => $validated['track'],
        ]);

        return redirect()->route('strands.index')->with('success', 'Strand updated successfully.');
    }

    public function destroy($id)
    {
        $strand = Strand::findOrFail($id);
        $strand->delete();

        return redirect()->route('strands.index')->with('success', 'Strand deleted successfully.');
    }
}
