<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Matiere;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class EtudiantController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $etudiantsQuery = Etudiant::query();

        if ($search) {
            $etudiantsQuery->where(function ($query) use ($search) {
                $query->where('nom', 'like', '%' . $search . '%')
                    ->orWhere('prenom', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $etudiants = $etudiantsQuery->paginate(6);
        $classes = Classe::withCount('etudiants')->get();
        return view('admin.etudiants.index', compact('etudiants', 'search'));
    }

    public function create()
    {
        $classes = Classe::all();
        return view('admin.etudiants.create', compact("classes"));
    }


    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'date_naissance' => 'required|date',
            'classe_id' => 'required|exists:classes,id'
        ]);

        $formFields['password'] = Hash::make($formFields['password']);

        Etudiant::create($formFields);

        return redirect()->route('admin.etudiants.index');;
    }

    public function edit(Etudiant $etudiant)
    {
        $classes = Classe::all();
        return view("admin.etudiants.edit", compact('etudiant', 'classes'));
    }

    public function update(Request $request, Etudiant $etudiant)
    {
        $formFields = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:255',
            'date_naissance' => 'required|date',
            'classe_id' => 'required|exists:classes,id'
        ]);

        $formFields['password'] = isset($formFields['password']) ? Hash::make($formFields['password']) : $etudiant->password;

        $etudiant->fill($formFields)->save();

        return redirect()->route('admin.etudiants.index');
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('admin.etudiants.index');
    }

    public function classement()
    {
        $etudiants = Etudiant::all()
            ->sortByDesc(fn($e) => $e->moyenne)
            ->take(8)
            ->values();

        return view('admin.classement.index', compact('etudiants'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        $etudiant = Etudiant::find($user->id);

        $moyenne = $etudiant->moyenne;
        $statut = $etudiant->statut;
        $mention = $etudiant->mention;

        return view('etudiant.dashboard', compact("etudiant", "moyenne", "statut", "mention"));
    }

    public function notes()
    {
        $user = Auth::user();
        $etudiant = Etudiant::find($user->id);

        return view('etudiant.notes', compact('etudiant'));
    }

    public function exportReleveNote($id)
    {
        $user = Auth::user();

        if (auth()->guard('etudiant')->check()) {
            if ($user->id != $id) {
                abort(403);
            }
        }

        $etudiant = Etudiant::find($user->id);

        $data = [
            'etudiant' => $etudiant
        ];

        $pdf = Pdf::loadView('notes.pdf', $data);

        return $pdf->download('releve_notes_' . $etudiant->nom . '.pdf');
    }
}
