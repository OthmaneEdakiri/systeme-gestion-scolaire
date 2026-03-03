@extends('layouts.etudiant')

@section('content')
    <div class="max-w-6xl mx-auto p-6">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold">Mes Notes</h1>
            <p class="text-gray-600">
                Classe: {{ $etudiant->classe->nom }}
            </p>
        </div>

        {{-- Table --}}
        <div class="bg-white shadow rounded-xl p-6">

            <table class="w-full text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">Matière</th>
                        <th class="p-3">Coefficient</th>
                        <th class="p-3">Note (/20)</th>
                        <th class="p-3">Résultat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($etudiant->notes as $note)
                        <tr class="border-t">
                            <td class="p-3">
                                {{ $note->matiere->nom }}
                            </td>
                            <td class="p-3">
                                {{ $note->matiere->coefficient }}
                            </td>
                            <td
                                class="p-3
                                                                    {{ $note->note >= 10 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $note->note ?? '-' }}
                            </td>
                            <td class="p-3">
                                @if($note->note >= 10)
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                        Validé
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">
                                        Non validé
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Aucune note disponible.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Moyenne générale --}}
            <div class="flex justify-between items-center mt-3">
                <a href="{{ route('etudiant.notes.export', $etudiant->id) }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700
                  text-white font-medium px-3 py-2 rounded-lg
                  shadow-md hover:shadow-lg transition duration-200">

                    <!-- Icon Download -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                    </svg>

                    Télécharger mon relevé
                </a>
                <div class="mt-6 text-right">
                    <span class="text-gray-600">Moyenne Générale:</span>
                    <span class="font-bold text-lg">
                        {{ $etudiant->moyenne }}/20
                    </span>
                </div>
            </div>

        </div>

    </div>
@endsection
