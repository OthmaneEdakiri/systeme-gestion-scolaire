@extends('layouts.admin')

@section('title', 'Classement')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Classement des Étudiants</h1>
</div>

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rang</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classe</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moyenne</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($etudiants as $index => $etudiant)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($index === 0)
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-400 text-yellow-900 font-bold">1</span>
                        @elseif($index === 1)
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-300 text-gray-700 font-bold">2</span>
                        @elseif($index === 2)
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-amber-600 text-white font-bold">3</span>
                        @else
                            <span class="text-gray-600 font-medium">{{ $index + 1 }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 font-medium">{{ $etudiant->nom }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $etudiant->prenom }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $etudiant->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $etudiant->classe->nom ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-lg font-bold text-blue-600">{{ number_format($etudiant->moyenne, 2) }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($index === 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                🥇 Top Student
                            </span>
                        @elseif($etudiant->moyenne >= 10)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                ✅ Admis
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                ❌ Failed
                            </span>
                        @endif
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
@endsection
