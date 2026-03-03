@extends('layouts.enseignant')
@section('content')
    {{-- Liste des matières --}}
    <div class="bg-white shadow rounded-xl p-6">
        <h2 class="text-lg font-semibold mb-4">Mes Matières</h2>

        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Matière</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enseignant->matieres as $matiere)
                    <tr class="border-t">
                        <td class="p-3">
                            {{ $matiere->nom }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-4 text-center text-gray-500">
                            Aucune matière assignée.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

@endsection
