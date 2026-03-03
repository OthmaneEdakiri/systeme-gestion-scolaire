<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Matiere;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::withCount('etudiants')->get();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        $nom = $request->nom;

        Classe::create([
            'nom' => $nom
        ]);

        return redirect()->route('admin.classes.index');
    }

    public function edit($id)
    {
        $classe = Classe::find($id);
        $matieres = Matiere::all();

        return view('admin.classes.edit', compact('classe', 'matieres'));
    }

    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        $classe = Classe::find($id);

        $classe->fill($formFields)->save();

        if ($request->has('matieres')) {
            $classe->matieres()->sync($request->matieres);
        } else {
            $classe->matieres()->detach();
        }

        return redirect()->route('admin.classes.index');
    }

    public function destroy($id)
    {
        $classe = Classe::find($id);
        $classe->delete();

        return redirect()->route('admin.classes.index');
    }
}
