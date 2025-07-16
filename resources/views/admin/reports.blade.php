@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-3xl">
    <h1 class="text-2xl font-bold mb-6">Signalements</h1>
    @if(session('success'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Utilisateur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Motif</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Statut</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($reports as $report)
                <tr>
                    <td class="px-6 py-4">{{ $report->user->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $report->reason ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($report->resolved)
                            <span class="text-green-600 font-semibold">Résolu</span>
                        @else
                            <span class="text-red-600 font-semibold">En attente</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if(!$report->resolved)
                        <form action="{{ route('admin.reports.resolve', $report) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-blue-600 hover:underline">Marquer comme résolu</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 