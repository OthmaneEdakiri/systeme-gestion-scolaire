@extends('layouts.etudiant')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold">
            Bonjour {{ $etudiant->prenom }} 👋
        </h1>
        <p class="text-gray-600">
            Bienvenue dans votre espace étudiant
        </p>
    </div>

    {{-- Cards Section --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        {{-- Classe --}}
        <div class="bg-white shadow rounded-xl p-5">
            <p class="text-sm text-gray-500">Classe</p>
            <h2 class="text-xl font-semibold">
                {{ $etudiant->classe->nom }}
            </h2>
        </div>

        {{-- Moyenne --}}
        <div class="bg-white shadow rounded-xl p-5">
            <p class="text-sm text-gray-500">Moyenne Générale</p>
            <h2 class="text-xl font-semibold">
                {{ $moyenne }}/20
            </h2>
        </div>

        {{-- Statut --}}
        <div class="bg-white shadow rounded-xl p-5">
            <p class="text-sm text-gray-500">Statut</p>
            <h2 class="text-xl font-semibold
                {{ $statut == 'Admis' ? 'text-green-600' : 'text-red-600' }}">
                {{ $statut }}
            </h2>
        </div>

        {{-- Mention --}}
        <div class="bg-white shadow rounded-xl p-5">
            <p class="text-sm text-gray-500">Mention</p>
            <h2 class="text-xl font-semibold">
                {{ $mention }}
            </h2>
        </div>

    </div>
</div>
@endsection
