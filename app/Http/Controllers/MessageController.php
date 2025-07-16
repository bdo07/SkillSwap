<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $matchId)
    {
        $match = \App\Models\UserMatch::findOrFail($matchId);
        $this->authorize('view', $match);
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        $message = $match->messages()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);
        broadcast(new \App\Events\MessageSent($message))->toOthers();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($matchId)
    {
        $match = \App\Models\UserMatch::findOrFail($matchId);
        $this->authorize('view', $match); // à implémenter dans la policy
        $messages = $match->messages()->with('user')->orderBy('created_at')->get();
        return view('messages.show', compact('match', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
