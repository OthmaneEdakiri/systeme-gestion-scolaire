@extends('layouts.admin')

@section('title', 'Modifier un Enseignant')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Modifier l'Enseignant</h1>
    <a href="{{ route('admin.enseignants.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors">
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

    <form action="{{ route('admin.enseignants.update', $enseignant) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $enseignant->nom }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-5">
            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prenom</label>
            <input type="text" name="prenom" id="prenom" value="{{ $enseignant->prenom }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-5">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ $enseignant->email }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-5">
            <label for="specialite" class="block text-sm font-medium text-gray-700 mb-2">Spécialité</label>
            <input type="text" name="specialite" id="specialite" value="{{ $enseignant->specialite }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-5">
            <label for="matieres" class="block text-sm font-medium text-gray-700 mb-2">Matières</label>
            <select name="matieres[]" id="matieres" multiple class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-32">
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ $enseignant->matieres->contains($matiere->id) ? 'selected' : '' }}>
                        {{ $matiere->nom }}
                    </option>
                @endforeach
            </select>
            <p class="mt-1 text-sm text-gray-500">Maintenez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs matières</p>
        </div>

        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
            Mettre à jour l'Enseignant
        </button>
    </form>
</div>
@endsection
