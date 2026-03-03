@extends('layouts.admin')

@section('title', 'Matières')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Gestion des Matières</h1>
        <a href="{{ route('admin.matieres.create') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
            ➕ Ajouter une Matière
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coefficient
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enseignants
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($matieres as $matiere)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $matiere->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $matiere->nom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $matiere->coefficient }}</td>
                        <td>
                            @forelse($matiere->enseignants as $enseignant)
                                <span
                                    class="inline-block px-2 py-1 text-xs bg-indigo-100 text-indigo-700 rounded-full mr-1 mb-1">{{ $enseignant->nom }}</span>
                            @empty
                                <span class="text-gray-400 text-sm">Aucune</span>
                            @endforelse
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.matieres.edit', $matiere) }}"
                                    class="flex items-center gap-1 px-3 py-1 bg-emerald-500 hover:bg-emerald-600 text-white rounded text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    Modifier
                                </a>
                                <form action="{{ route('admin.matieres.destroy', $matiere) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center gap-1 px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette matière?')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">Aucune matière trouvée</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
