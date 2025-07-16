<!DOCTYPE html>
<html lang="fr" x-data="{ dark: localStorage.getItem('theme') === 'dark' }" x-init="$watch('dark', val => localStorage.setItem('theme', val ? 'dark' : 'light'))" :class="{ 'dark': dark }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSwap</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen text-gray-900 dark:text-gray-100">
    <nav class="bg-white dark:bg-gray-800 shadow mb-8">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-600 dark:text-blue-400">SkillSwap</a>
            <div class="flex gap-4 items-center">
                <a href="{{ route('skills.index') }}" class="hover:underline">Compétences</a>
                <a href="{{ route('profiles.index') }}" class="hover:underline">Profils</a>
                <a href="{{ route('matching.index') }}" class="hover:underline">Matching</a>
                @auth
                    <a href="{{ route('profiles.show', auth()->user()->profile ?? 0) }}" class="hover:underline">Mon profil</a>
                    @if(auth()->user()->is_admin ?? false)
                        <a href="{{ route('admin.dashboard') }}" class="hover:underline text-red-500">Admin</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline ml-2">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="hover:underline">Inscription</a>
                @endauth
                <button @click="dark = !dark" class="ml-4 p-2 rounded bg-gray-200 dark:bg-gray-700" title="Basculer le mode sombre">
                    <span x-show="!dark">🌙</span>
                    <span x-show="dark">☀️</span>
                </button>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>
