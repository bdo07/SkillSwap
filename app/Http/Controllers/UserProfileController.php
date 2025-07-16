<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = UserProfile::with('user')->get();
        return view('profiles.index', compact('profiles'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile)
    {
        $userProfile->load('user');
        return view('profiles.show', compact('userProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile)
    {
        $skills = \App\Models\Skill::all();
        $user = $userProfile->user;
        $teaching = $user->skills->pluck('id')->toArray();
        $learning = $user->learnings->pluck('id')->toArray();
        return view('profiles.edit', compact('userProfile', 'skills', 'teaching', 'learning'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        $validated = $request->validate([
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'teaching' => 'array',
            'teaching.*' => 'exists:skills,id',
            'learning' => 'array',
            'learning.*' => 'exists:skills,id',
        ]);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profiles', 'public');
            $userProfile->photo = $path;
        }
        $userProfile->bio = $validated['bio'] ?? $userProfile->bio;
        $userProfile->save();
        $user = $userProfile->user;
        $user->skills()->sync($validated['teaching'] ?? []);
        $user->learnings()->sync($validated['learning'] ?? []);
        return redirect()->route('profiles.show', $userProfile)->with('success', 'Profil mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
