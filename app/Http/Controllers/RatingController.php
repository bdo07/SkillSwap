<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($matchId)
    {
        $match = \App\Models\UserMatch::findOrFail($matchId);
        $this->authorize('view', $match);
        return view('ratings.create', compact('match'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $matchId)
    {
        $match = \App\Models\UserMatch::findOrFail($matchId);
        $this->authorize('view', $match);
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        $match->ratings()->create([
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);
        return redirect()->route('profiles.show', auth()->user()->profile)->with('success', 'Évaluation enregistrée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
