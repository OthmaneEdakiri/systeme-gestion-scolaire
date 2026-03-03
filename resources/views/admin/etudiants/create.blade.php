@extends('layouts.admin')

@section('title', 'Créer un Étudiant')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Créer un nouvel Étudiant</h1>
        <a href="{{ route('admin.etudiants.index') }}"
            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors">
            ← Retour à la liste
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6">
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <ul class="list-disc list-inside text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.etudiants.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-2">Date naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" value="{{ old('date_naissance') }}" required
                    min="1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-5">
                <label for="classe_id" class="block text-sm font-medium text-gray-700 mb-2">Classe</label>
                <select name="classe_id" id="classe_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Sélectionner une classe</option>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}" {{ old('classe_id') == $classe->id ? 'selected' : '' }}>
                            {{ $classe->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                Créer l'Étudiant
            </button>
        </form>
    </div>
@endsection
