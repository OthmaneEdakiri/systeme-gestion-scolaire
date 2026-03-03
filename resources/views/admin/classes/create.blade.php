@extends('layouts.admin')

@section('title', 'Créer une Classe')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Créer une nouvelle Classe</h1>
    <a href="{{ route('admin.classes.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors">
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

    <form action="{{ route('admin.classes.store') }}" method="POST">
        @csrf

        <div class="mb-5">
            <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom de la Classe</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ex: Classe 1ère Année">
        </div>

        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
            Créer la Classe
        </button>
    </form>
</div>
@endsection
