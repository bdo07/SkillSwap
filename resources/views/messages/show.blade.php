@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Messagerie</h1>
    <div id="messages" class="bg-white dark:bg-gray-800 p-4 rounded shadow h-96 overflow-y-auto flex flex-col gap-2 mb-4">
        @foreach($messages as $message)
            <div class="@if($message->user_id === auth()->id()) text-right @endif">
                <span class="inline-block px-3 py-2 rounded @if($message->user_id === auth()->id()) bg-blue-600 text-white @else bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 @endif">
                    <strong>{{ $message->user->name }}</strong> : {{ $message->content }}
                </span>
                <div class="text-xs text-gray-500">{{ $message->created_at->format('H:i') }}</div>
            </div>
        @endforeach
    </div>
    <form action="{{ route('messages.store', $match) }}" method="POST" class="flex gap-2">
        @csrf
        <input type="text" name="content" class="flex-1 px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" placeholder="Votre message..." required autocomplete="off">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Envoyer</button>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    Pusher.logToConsole = false;
    var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
        encrypted: true
    });
    var channel = pusher.subscribe('private-match-{{ $match->id }}');
    channel.bind('App\\Events\\MessageSent', function(data) {
        const messages = document.getElementById('messages');
        const div = document.createElement('div');
        div.innerHTML = `<span class='inline-block px-3 py-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100'><strong>${data.user.name}</strong> : ${data.content}</span><div class='text-xs text-gray-500'>${data.created_at}</div>`;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    });
</script>
@endpush 