<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin @hasSection('title')- @yield('title')@endif</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-blue-900 to-blue-600 text-white fixed h-full shadow-xl z-50">
            <div class="p-6 border-b border-white/10 text-center">
                <h1 class="text-2xl font-bold">🎓 École</h1>
                <p class="text-sm opacity-80">Gestion Scolaire</p>
            </div>

            <nav class="py-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 py-3 hover:bg-white/5 px-6 transition-colors border-l-4 {{ request()->routeIs('admin.dashboard') ? 'border-green-400 bg-white/15' : 'border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.etudiants.index') }}" class="flex items-center gap-3 py-3.5 px-6 hover:bg-white/10 transition-colors border-l-4 {{ request()->routeIs('admin.etudiants.*') ? 'border-green-400 bg-white/15' : 'border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Étudiants
                </a>
                <a href="{{ route('admin.classes.index') }}" class="flex items-center gap-3 py-3.5 px-6 hover:bg-white/10 transition-colors border-l-4 {{ request()->routeIs('admin.classes.*') ? 'border-green-400 bg-white/15' : 'border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Classes
                </a>
                <a href="{{ route('admin.matieres.index') }}" class="flex items-center gap-3 py-3.5 px-6 hover:bg-white/10 transition-colors border-l-4 {{ request()->routeIs('admin.matieres.*') ? 'border-green-400 bg-white/15' : 'border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Matières
                </a>
                <a href="{{ route('admin.enseignants.index') }}" class="flex items-center gap-3 py-3.5 px-6 hover:bg-white/10 transition-colors border-l-4 {{ request()->routeIs('admin.enseignants.*') ? 'border-green-400 bg-white/15' : 'border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Enseignants
                </a>
                <a href="{{ route('admin.classement.index') }}" class="flex items-center gap-3 py-3.5 px-6 hover:bg-white/10 transition-colors border-l-4 {{ request()->routeIs('admin.classement.*') ? 'border-green-400 bg-white/15' : 'border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    Classement
                </a>
                <a href="{{ route('admin.notes.index') }}" class="flex items-center gap-3 py-3.5 px-6 hover:bg-white/10 transition-colors border-l-4 {{ request()->routeIs('admin.notes.*') ? 'border-green-400 bg-white/15' : 'border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Notes
                </a>
            </nav>

            <div class="absolute bottom-0 w-full p-6 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 bg-red-600 hover:bg-red-700 rounded-lg font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Déconnexion
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="px-8 py-5 flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                    <div class="flex items-center gap-3">
                        <span class="text-gray-600">Admin</span>
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center text-white font-semibold">
                            A
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    @yield('scripts')
</body>

</html>
