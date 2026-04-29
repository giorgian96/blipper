<?php

namespace App\Http\Controllers;

use App\Models\Blip;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class BlipController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blips = Blip::with('user')->latest()->take(50)->get();

        return view('home', ['blips' => $blips]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        auth()->user()->blips()->create($validated);

        return redirect('/')->with('success', 'Blip created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blip $blip)
    {
        $this->authorize('update', $blip);
        return view('blips.edit', compact('blip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blip $blip)
    {
        $this->authorize('update', $blip);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $blip->update($validated);

        return redirect('/')->with('success', 'Your blip has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blip $blip)
    {
        $this->authorize('update', $blip);
        $blip->delete();
        return redirect('/')->with('success', 'Your blip has been deleted!');
    }
}
