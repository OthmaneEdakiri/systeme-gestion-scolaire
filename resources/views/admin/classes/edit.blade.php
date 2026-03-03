@extends('layouts.admin')

@section('title', 'Modifier une Classe')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Modifier la Classe</h1>
        <a href="{{ route('admin.classes.index') }}"
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

        <form action="{{ route('admin.classes.update', $classe) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom de la Classe</label>
                <input type="text" name="nom" id="nom" value="{{ $classe->nom }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ex: Classe 1ère Année">
            </div>

            <div class="mb-5">
                <label for="matieres" class="block text-sm font-medium text-gray-700 mb-2">Matières</label>
                <select name="matieres[]" id="matieres" multiple
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-32">
                    @foreach($matieres as $matiere)
                        <option value="{{ $matiere->id }}" {{ $classe->matieres->contains($matiere->id) ? 'selected' : '' }}>
                            {{ $matiere->nom }}
                        </option>
                    @endforeach
                </select>
                <p class="mt-1 text-sm text-gray-500">Maintenez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs
                    matières</p>
            </div>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                Mettre à jour la Classe
            </button>
        </form>
    </div>
@endsection
