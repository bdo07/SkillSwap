<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4 bg-white/60 dark:bg-gray-900/60 backdrop-blur-md rounded-xl p-6 shadow-lg mb-8 border border-purple-200 dark:border-purple-800">
            <img src="{{ $user->profile && $user->profile->photo ? asset('storage/' . $user->profile->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=8b5cf6&color=fff' }}" class="w-16 h-16 rounded-full border-4 border-purple-400 shadow" alt="Avatar">
            <div>
                <h2 class="font-bold text-2xl text-purple-800 dark:text-purple-300">Bienvenue, {{ $user->name }} !</h2>
                <div class="text-gray-600 dark:text-gray-300">Prêt à échanger vos compétences aujourd'hui ?</div>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Cartes de stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="glass-card bg-gradient-to-br from-purple-400/60 to-indigo-400/40 border border-purple-300 dark:border-purple-700 p-6 rounded-2xl shadow-lg flex flex-col items-center">
                    <div class="text-3xl font-bold text-purple-800 dark:text-purple-200 animate-pulse">{{ $messagesCount }}</div>
                    <div class="text-sm text-gray-700 dark:text-gray-200 mt-2">Messages</div>
                </div>
                <div class="glass-card bg-gradient-to-br from-fuchsia-400/60 to-purple-400/40 border border-fuchsia-300 dark:border-fuchsia-700 p-6 rounded-2xl shadow-lg flex flex-col items-center">
                    <div class="text-3xl font-bold text-fuchsia-800 dark:text-fuchsia-200 animate-pulse">{{ $matchesCount }}</div>
                    <div class="text-sm text-gray-700 dark:text-gray-200 mt-2">Matches</div>
                </div>
                <div class="glass-card bg-gradient-to-br from-violet-400/60 to-purple-300/40 border border-violet-300 dark:border-violet-700 p-6 rounded-2xl shadow-lg flex flex-col items-center">
                    <div class="text-3xl font-bold text-violet-800 dark:text-violet-200 animate-pulse">{{ $skillsCount }}</div>
                    <div class="text-sm text-gray-700 dark:text-gray-200 mt-2">Compétences</div>
                </div>
                <div class="glass-card bg-gradient-to-br from-pink-400/60 to-purple-200/40 border border-pink-300 dark:border-pink-700 p-6 rounded-2xl shadow-lg flex flex-col items-center">
                    <div class="text-3xl font-bold text-pink-800 dark:text-pink-200 animate-pulse">{{ $ratingsCount }}</div>
                    <div class="text-sm text-gray-700 dark:text-gray-200 mt-2">Évaluations</div>
                </div>
            </div>
            <!-- Raccourcis d'action -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a href="{{ route('messages.history') }}" class="shortcut-card group">
                    <div class="icon-bg bg-gradient-to-tr from-purple-500 to-indigo-400">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg text-purple-900 dark:text-purple-200 group-hover:text-purple-600">Messagerie</div>
                        <div class="text-gray-500 dark:text-gray-300 text-sm">Voir vos conversations</div>
                    </div>
                </a>
                <a href="{{ route('matching.index') }}" class="shortcut-card group">
                    <div class="icon-bg bg-gradient-to-tr from-fuchsia-500 to-purple-400">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg text-fuchsia-900 dark:text-fuchsia-200 group-hover:text-fuchsia-600">Matching</div>
                        <div class="text-gray-500 dark:text-gray-300 text-sm">Trouver un partenaire</div>
                    </div>
                </a>
                <a href="{{ route('skills.index') }}" class="shortcut-card group">
                    <div class="icon-bg bg-gradient-to-tr from-violet-500 to-purple-400">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20l9-5-9-5-9 5 9 5zm0-10V4m0 0L2 9m10-5l10 5"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg text-violet-900 dark:text-violet-200 group-hover:text-violet-600">Compétences</div>
                        <div class="text-gray-500 dark:text-gray-300 text-sm">Gérer vos compétences</div>
                    </div>
                </a>
                <a href="{{ route('profiles.index') }}" class="shortcut-card group">
                    <div class="icon-bg bg-gradient-to-tr from-purple-500 to-pink-400">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg text-purple-900 dark:text-purple-200 group-hover:text-purple-600">Profils</div>
                        <div class="text-gray-500 dark:text-gray-300 text-sm">Voir les profils utilisateurs</div>
                    </div>
                </a>
                <a href="#" class="shortcut-card group">
                    <div class="icon-bg bg-gradient-to-tr from-pink-500 to-purple-400">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg text-pink-900 dark:text-pink-200 group-hover:text-pink-600">Évaluations</div>
                        <div class="text-gray-500 dark:text-gray-300 text-sm">Voir vos évaluations</div>
                    </div>
                </a>
                @if(Auth::user() && Auth::user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="shortcut-card group">
                    <div class="icon-bg bg-gradient-to-tr from-purple-700 to-red-400">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 14.93V17h-2v-2h2v-.07c-2.83-.48-5-2.94-5-5.93h2c0 2.21 1.79 4 4 4s4-1.79 4-4h2c0 2.99-2.17 5.45-5 5.93z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-lg text-red-900 dark:text-red-200 group-hover:text-red-600">Admin</div>
                        <div class="text-gray-500 dark:text-gray-300 text-sm">Accès au dashboard admin</div>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>

    <style>
        .glass-card {
            backdrop-filter: blur(12px) saturate(120%);
            background-blend-mode: overlay;
        }
        .shortcut-card {
            @apply flex items-center gap-4 bg-white/60 dark:bg-gray-900/60 border border-purple-200 dark:border-purple-800 rounded-xl p-5 shadow-lg hover:scale-105 transition transform duration-200;
        }
        .icon-bg {
            @apply w-14 h-14 flex items-center justify-center rounded-full shadow-lg mb-0;
        }
    </style>
</x-app-layout>
