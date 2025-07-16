@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow flex flex-col items-center">
        <img src="{{ $userProfile->photo ? asset('storage/' . $userProfile->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($userProfile->user->name) }}" class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-blue-500" alt="Photo de profil">
        <h1 class="text-2xl font-bold mb-2">{{ $userProfile->user->name }}</h1>
        <p class="mb-4 text-gray-700 dark:text-gray-200">{{ $userProfile->bio }}</p>
        <div class="w-full flex flex-col md:flex-row gap-6">
            <div class="flex-1">
                <h2 class="font-semibold text-lg mb-2">Peut enseigner :</h2>
                <ul class="list-disc ml-5 text-blue-700 dark:text-blue-300">
                    @foreach($userProfile->user->skills as $skill)
                        <li>{{ $skill->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-1">
                <h2 class="font-semibold text-lg mb-2">Veut apprendre :</h2>
                <ul class="list-disc ml-5 text-green-700 dark:text-green-300">
                    @foreach($userProfile->user->learnings as $skill)
                        <li>{{ $skill->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @auth
        @if(auth()->id() === $userProfile->user_id)
            <a href="{{ route('profiles.edit', $userProfile) }}" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Éditer mon profil</a>
        @endif
        @endauth
    </div>
</div>
@endsection 