@extends('layouts.admin')

@section('title', 'Notes')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Gestion des Notes</h1>
</div>

{{-- 🔎 Filter Section --}}
<form method="GET" action="{{ route('admin.notes.index') }}" class="bg-white rounded-xl shadow-md p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Classe --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Classe</label>
            <select name="classe_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Choisir Classe --</option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id }}" {{ request('classe_id') == $classe->id ? 'selected' : '' }}>
                        {{ $classe->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Matiere --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Matière</label>
            <select name="matiere_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Choisir Matière --</option>
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ request('matiere_id') == $matiere->id ? 'selected' : '' }}>
                        {{ $matiere->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-end">
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                🔍 Charger
            </button>
        </div>
    </div>
</form>

{{-- 📋 Students Table --}}
@if(isset($students) && request('classe_id') && request('matiere_id'))
    <form method="POST" action="{{ route('admin.notes.save') }}">
        @csrf
        <input type="hidden" name="classe_id" value="{{ request('classe_id') }}">
        <input type="hidden" name="matiere_id" value="{{ request('matiere_id') }}">

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note (/20)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($students as $index => $student)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 font-medium">{{ $student->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $student->prenom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       max="20"
                                       name="notes[{{ $student->id }}]"
                                       value="{{ $student->note ?? '' }}"
                                       class="w-24 px-3 py-2 border-2 rounded-lg text-center font-medium focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none
                                       @if(isset($student->note) && $student->note < 10) border-red-300 bg-red-50 text-red-700
                                       @elseif(isset($student->note) && $student->note >= 10) border-green-300 bg-green-50 text-green-700
                                       @else border-gray-300
                                       @endif">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-right">
            <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                💾 Enregistrer
            </button>
        </div>
    </form>
@else
    <div class="bg-white rounded-xl shadow-md p-8 text-center">
        <p class="text-gray-500">Sélectionnez une classe et une matière pour gérer les notes</p>
    </div>
@endif
@endsection
