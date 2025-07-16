<?php

namespace App\Http\Controllers;

use App\Models\UserMatch;
use Illuminate\Http\Request;

class UserMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $teaching = $user->skills->pluck('id')->toArray();
        $learning = $user->learnings->pluck('id')->toArray();
        // Trouver les utilisateurs qui veulent apprendre ce que j'enseigne et enseigner ce que je veux apprendre
        $matches = \App\Models\User::where('id', '!=', $user->id)
            ->whereHas('learnings', function($q) use ($teaching) {
                $q->whereIn('skills.id', $teaching);
            })
            ->whereHas('skills', function($q) use ($learning) {
                $q->whereIn('skills.id', $learning);
            })
            ->get();
        return view('matching.index', compact('matches'));
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
    public function store($userId)
    {
        $user = auth()->user();
        $other = \App\Models\User::findOrFail($userId);
        // Vérifier si un match existe déjà
        $exists = \App\Models\UserMatch::where(function($q) use ($user, $other) {
            $q->where('user1_id', $user->id)->where('user2_id', $other->id);
        })->orWhere(function($q) use ($user, $other) {
            $q->where('user1_id', $other->id)->where('user2_id', $user->id);
        })->exists();
        if (!$exists) {
            \App\Models\UserMatch::create([
                'user1_id' => $user->id,
                'user2_id' => $other->id,
                'status' => 'pending',
            ]);
        }
        return redirect()->route('matching.index')->with('success', 'Match proposé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserMatch $userMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMatch $userMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserMatch $userMatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserMatch $userMatch)
    {
        //
    }
}
