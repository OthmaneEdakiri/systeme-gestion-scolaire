@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
            <h3 class="text-gray-500 text-sm font-medium mb-2">Total Étudiants</h3>
            <div class="text-blue-800 text-3xl font-bold">{{ $totalStudents }}</div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
            <h3 class="text-gray-500 text-sm font-medium mb-2">Total Classes</h3>
            <div class="text-blue-800 text-3xl font-bold">{{ $totalClasses }}</div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
            <h3 class="text-gray-500 text-sm font-medium mb-2">Total Matières</h3>
            <div class="text-blue-800 text-3xl font-bold">{{ $totalSubjects }}</div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
            <h3 class="text-gray-500 text-sm font-medium mb-2">Total Enseignants</h3>
            <div class="text-blue-800 text-3xl font-bold">{{ $totalTeachers }}</div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow">
            <h3 class="text-gray-500 text-sm font-medium mb-2">Moyenne Générale</h3>
            <div class="text-blue-800 text-3xl font-bold">{{ $overallAverage ? number_format($overallAverage, 2) : 'N/A' }}
            </div>
        </div>
    </div>

    @if($bestClass)
        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-xl p-6 shadow-lg">
            <h2 class="text-lg font-semibold mb-2">Classe avec la meilleure moyenne</h2>
            <p class="text-2xl font-bold">{{ $bestClass->nom }} - Moyenne: {{ number_format($bestClass->moyenne, 2) }}</p>
        </div>
    @endif
@endsection
