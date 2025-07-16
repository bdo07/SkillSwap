@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-lg">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $skill->name }}</h1>
        <p class="mb-4 text-gray-700 dark:text-gray-200">{{ $skill->description }}</p>
        <a href="{{ route('skills.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded">Retour</a>
    </div>
</div>
@endsection 