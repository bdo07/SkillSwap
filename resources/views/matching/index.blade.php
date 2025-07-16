@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-3xl">
    <h1 class="text-2xl font-bold mb-6">Utilisateurs compatibles</h1>
    @if(session('success'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if($matches->isEmpty())
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">Aucune correspondance trouvée pour le moment.</div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($matches as $user)
            <div class="bg-white dark:bg-gray-800 p-4 rounded shadow flex flex-col items-center">
                <img src="{{ $user->profile && $user->profile->photo ? asset('storage/' . $user->profile->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" class="w-20 h-20 rounded-full object-cover mb-2 border-4 border-blue-500" alt="Photo de profil">
                <h2 class="text-lg font-semibold mb-1">{{ $user->name }}</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-2 line-clamp-2">{{ $user->profile->bio ?? '' }}</p>
                <form action="{{ route('matching.store', $user) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Proposer un match</button>
                </form>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection 