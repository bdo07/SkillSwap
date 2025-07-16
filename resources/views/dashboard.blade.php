<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenue sur SkillSwap !') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Carte Messagerie -->
                <a href="{{ route('messages.history') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center hover:bg-blue-50 dark:hover:bg-gray-700 transition group">
                    <svg class="w-10 h-10 mb-2 text-blue-600 group-hover:text-blue-800 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    <div class="font-bold text-lg text-gray-900 dark:text-gray-100">Messagerie</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Voir vos conversations</div>
                </a>
                <!-- Carte Matching -->
                <a href="{{ route('matching.index') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center hover:bg-green-50 dark:hover:bg-gray-700 transition group">
                    <svg class="w-10 h-10 mb-2 text-green-600 group-hover:text-green-800 dark:text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <div class="font-bold text-lg text-gray-900 dark:text-gray-100">Matching</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Trouver un partenaire</div>
                </a>
                <!-- Carte Compétences -->
                <a href="{{ route('skills.index') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center hover:bg-yellow-50 dark:hover:bg-gray-700 transition group">
                    <svg class="w-10 h-10 mb-2 text-yellow-500 group-hover:text-yellow-700 dark:text-yellow-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20l9-5-9-5-9 5 9 5zm0-10V4m0 0L2 9m10-5l10 5"/></svg>
                    <div class="font-bold text-lg text-gray-900 dark:text-gray-100">Compétences</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Gérer vos compétences</div>
                </a>
                <!-- Carte Profils -->
                <a href="{{ route('profiles.index') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center hover:bg-purple-50 dark:hover:bg-gray-700 transition group">
                    <svg class="w-10 h-10 mb-2 text-purple-600 group-hover:text-purple-800 dark:text-purple-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <div class="font-bold text-lg text-gray-900 dark:text-gray-100">Profils</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Voir les profils utilisateurs</div>
                </a>
                <!-- Carte Évaluations -->
                <a href="#" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center hover:bg-pink-50 dark:hover:bg-gray-700 transition group">
                    <svg class="w-10 h-10 mb-2 text-pink-600 group-hover:text-pink-800 dark:text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    <div class="font-bold text-lg text-gray-900 dark:text-gray-100">Évaluations</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Voir vos évaluations</div>
                </a>
                <!-- Carte Admin (si admin) -->
                @if(Auth::user() && Auth::user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center hover:bg-red-50 dark:hover:bg-gray-700 transition group">
                    <svg class="w-10 h-10 mb-2 text-red-600 group-hover:text-red-800 dark:text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 14.93V17h-2v-2h2v-.07c-2.83-.48-5-2.94-5-5.93h2c0 2.21 1.79 4 4 4s4-1.79 4-4h2c0 2.99-2.17 5.45-5 5.93z"/></svg>
                    <div class="font-bold text-lg text-gray-900 dark:text-gray-100">Admin</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Accès au dashboard admin</div>
                </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
