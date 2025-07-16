@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Éditer mon profil</h1>
    <form action="{{ route('profiles.update', $userProfile) }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4 flex flex-col items-center">
            <img src="{{ $userProfile->photo ? asset('storage/' . $userProfile->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($userProfile->user->name) }}" class="w-24 h-24 rounded-full object-cover mb-2 border-4 border-blue-500" alt="Photo de profil">
            <input type="file" name="photo" class="mt-2">
            @error('photo')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Bio</label>
            <textarea name="bio" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('bio', $userProfile->bio) }}</textarea>
            @error('bio')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Compétences à enseigner</label>
            <select name="teaching[]" multiple class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" @if(in_array($skill->id, $teaching)) selected @endif>{{ $skill->name }}</option>
                @endforeach
            </select>
            @error('teaching')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Compétences à apprendre</label>
            <select name="learning[]" multiple class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" @if(in_array($skill->id, $learning)) selected @endif>{{ $skill->name }}</option>
                @endforeach
            </select>
            @error('learning')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('profiles.show', $userProfile) }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded">Annuler</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Enregistrer</button>
        </div>
    </form>
</div>
@endsection 