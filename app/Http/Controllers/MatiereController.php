<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::all();
        return view('admin.matieres.index', compact('matieres'));
    }

    public function create()
    {
        return view('admin.matieres.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer|min:1'
        ]);

        Matiere::create($formFields);

        return redirect()->route('admin.matieres.index');
    }

    public function edit(Matiere $matiere)
    {
        return view('admin.matieres.edit', compact('matiere'));
    }

    public function update(Request $request, Matiere $matiere)
    {
        $formFields = $request->validate([
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer|min:1'
        ]);

        $matiere->fill($formFields)->save();

        return redirect()->route('admin.matieres.index');
    }

    public function destroy(Matiere $matiere)
    {
        $matiere->delete();

        return redirect()->route('admin.matieres.index');
    }
}
