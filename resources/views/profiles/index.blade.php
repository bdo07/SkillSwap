@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Profils utilisateurs</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($profiles as $profile)
        <div class="bg-white dark:bg-gray-800 p-4 rounded shadow flex flex-col items-center">
            <img src="{{ $profile->photo ? asset('storage/' . $profile->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($profile->user->name) }}" class="w-20 h-20 rounded-full object-cover mb-2 border-4 border-blue-500" alt="Photo de profil">
            <h2 class="text-lg font-semibold mb-1">{{ $profile->user->name }}</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-2 line-clamp-2">{{ $profile->bio }}</p>
            <a href="{{ route('profiles.show', $profile) }}" class="mt-2 px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Voir profil</a>
        </div>
        @endforeach
    </div>
</div>
@endsection 