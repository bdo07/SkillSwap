@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Évaluer la session d'échange</h1>
    <form action="{{ route('ratings.store', $match) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Note</label>
            <div class="flex items-center gap-2">
                @for($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="rating" value="{{ $i }}" class="hidden" @if(old('rating') == $i) checked @endif>
                        <span class="text-2xl cursor-pointer @if(old('rating') == $i) text-yellow-400 @else text-gray-400 @endif">★</span>
                    </label>
                @endfor
            </div>
            @error('rating')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Commentaire</label>
            <textarea name="comment" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('comment') }}</textarea>
            @error('comment')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded">Annuler</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Envoyer</button>
        </div>
    </form>
</div>
@endsection 