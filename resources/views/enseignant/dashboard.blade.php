@extends('layouts.enseignant')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold">
            Bonjour {{ $enseignant->nom }} 👋
        </h1>
        <p class="text-gray-600">
            Spécialité : {{ $enseignant->specialite }}
        </p>
    </div>

</div>
@endsection
