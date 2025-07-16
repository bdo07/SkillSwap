@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
            <div class="text-4xl font-bold text-blue-600">{{ $usersCount }}</div>
            <div class="text-gray-700 dark:text-gray-200">Utilisateurs</div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
            <div class="text-4xl font-bold text-red-600">{{ $reportsCount }}</div>
            <div class="text-gray-700 dark:text-gray-200">Signalements</div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-center">
            <div class="text-4xl font-bold text-yellow-500">{{ $suspendedCount }}</div>
            <div class="text-gray-700 dark:text-gray-200">Comptes suspendus</div>
        </div>
    </div>
    <div class="mt-8 flex gap-4">
        <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Gérer les utilisateurs</a>
        <a href="{{ route('admin.reports') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Voir les signalements</a>
    </div>
</div>
@endsection 