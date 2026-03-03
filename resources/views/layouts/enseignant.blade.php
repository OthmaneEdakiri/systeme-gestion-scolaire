<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Enseignant @hasSection('title')- @yield('title')@endif</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div>
                        <h1 class="text-xl font-bold">🎓 École</h1>
                        <p class="text-xs text-white/70">Espace Étudiant</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex items-center gap-6">
                    <a href="{{ route('enseignant.dashboard') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('enseignant.dashboard') ? 'bg-white/20' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('enseignant.matieres') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('enseignant.matieres') ? 'bg-white/20' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Metiers
                    </a>
                </nav>

                <!-- User & Logout -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center text-sm font-semibold">
                            {{ substr($enseignant->prenom ?? 'E', 0, 1) }}
                        </div>
                        <span class="text-sm">{{ $enseignant->prenom ?? 'Enseignant' }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-4">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <p class="text-sm">© {{ date('Y') }} École - Gestion Scolaire. Tous droits réservés.</p>
        </div>
    </footer>

    @yield('scripts')
</body>

</html>
