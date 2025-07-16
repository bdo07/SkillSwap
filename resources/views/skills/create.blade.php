@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Ajouter une compétence</h1>
    <form action="{{ route('skills.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Nom</label>
            <input type="text" name="name" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" required>
            @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Description</label>
            <textarea name="description" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white"></textarea>
            @error('description')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('skills.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded">Annuler</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Créer</button>
        </div>
    </form>
</div>
@endsection 