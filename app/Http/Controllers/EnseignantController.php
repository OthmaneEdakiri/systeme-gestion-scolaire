<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EnseignantController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::with('matieres')->get();
        return view('admin.enseignants.index', compact('enseignants'));
    }

    public function create()
    {
        $matieres = Matiere::all();
        return view('admin.enseignants.create', compact("matieres"));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'specialite' => 'required|string|max:255'
        ]);

        $formFields['password'] = Hash::make($formFields['password']);

        $enseignant = Enseignant::create($formFields);

        if ($request->has('matieres')) {
            $enseignant->matieres()->attach($request->matieres);
        }

        return redirect()->route('admin.enseignants.index');
    }

    public function edit(Enseignant $enseignant)
    {
        $matieres = Matiere::all();
        return view("admin.enseignants.edit", compact('enseignant', 'matieres'));
    }

    public function update(Request $request, Enseignant $enseignant)
    {
        $formFields = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:255',
            'specialite' => 'required|string|max:255'
        ]);

        $formFields['password'] = isset($formFields['password']) ? Hash::make($formFields['password']) : $enseignant->password;

        $enseignant->fill($formFields)->save();

        if ($request->has('matieres')) {
            $enseignant->matieres()->sync($request->matieres);
        } else {
            $enseignant->matieres()->detach();
        }

        return redirect()->route('admin.enseignants.index');
    }

    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();

        return redirect()->route('admin.enseignants.index');
    }

    public function dashboard()
    {
        $user = Auth::user();

        $enseignant = Enseignant::find($user->id);

        $totalMatieres = $enseignant->matieres->count();

        return view('enseignant.dashboard', compact(
            'enseignant',
            'totalMatieres',
        ));
    }

    public function matieres()
    {
        $user = Auth::user();

        $enseignant = Enseignant::find($user->id);

        return view('enseignant.metieres', compact(
            'enseignant',
        ));
    }
}
