@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-3xl">
    <h1 class="text-2xl font-bold mb-6">Historique des conversations</h1>
    @if($matches->isEmpty())
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center text-gray-500 dark:text-gray-300">
            Aucune conversation trouvée.
        </div>
    @else
        <div class="grid gap-4">
            @foreach($matches as $match)
                @php
                    $otherUser = $match->user1_id === auth()->id() ? $match->user2 : $match->user1;
                    $lastMessage = $match->messages->first();
                @endphp
                <a href="{{ route('messages.show', $match) }}" class="block bg-white dark:bg-gray-800 p-4 rounded shadow hover:bg-blue-50 dark:hover:bg-gray-700 transition group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-lg font-semibold text-gray-600 dark:text-gray-300">
                                {{ strtoupper(substr($otherUser->name,0,1)) }}
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-gray-100 group-hover:text-blue-600">{{ $otherUser->name }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">Dernier message :
                                    @if($lastMessage)
                                        <span class="font-medium {{ $lastMessage->user_id === auth()->id() ? 'text-blue-600' : 'text-gray-700 dark:text-gray-300' }}">{{ $lastMessage->user->name }} :</span>
                                        {{ \Illuminate\Support\Str::limit($lastMessage->content, 40) }}
                                    @else
                                        Aucun message
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-xs text-gray-400">{{ $match->updated_at->diffForHumans() }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection 