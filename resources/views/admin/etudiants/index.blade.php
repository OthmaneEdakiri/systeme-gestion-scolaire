@extends('layouts.admin')

@section('title', 'Étudiants')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Gestion des Étudiants</h1>
    <a href="{{ route('admin.etudiants.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
        ➕ Ajouter
    </a>
</div>

<!-- Search Form -->

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="flex items-center justify-end gap-2 m-4">
        <input
            type="text"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Rechercher par nom, prénom ou email..."
            class="min-w-72 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
    </div>
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de naissance</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classe</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($etudiants as $etudiant)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $etudiant->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $etudiant->nom }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $etudiant->prenom }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $etudiant->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $etudiant->date_naissance }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $etudiant->classe->nom ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.etudiants.edit', $etudiant) }}" class="flex items-center gap-1 px-3 py-1 bg-emerald-500 hover:bg-emerald-600 text-white rounded text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Modifier
                            </a>
                            <form action="{{ route('admin.etudiants.destroy', $etudiant) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center gap-1 px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant?')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">Aucun étudiant trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $etudiants->links() }}
</div>

@endsection
