<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $classes = Classe::all();
        $matieres = Matiere::all();
        $students = [];

        if ($request->classe_id && $request->matiere_id) {

            $students = Etudiant::where('classe_id', $request->classe_id)
                ->get()
                ->map(function ($student) use ($request) {

                    $note = Note::where('etudiant_id', $student->id)
                        ->where('matiere_id', $request->matiere_id)
                        ->first();

                    $student->note = $note->note ?? null;

                    return $student;
                });
        }

        return view('admin.notes.index', compact('classes', 'matieres', 'students'));
    }

    public function save(Request $request)
    {
        foreach ($request->notes as $studentId => $note) {

            Note::updateOrCreate(
                [
                    'etudiant_id' => $studentId,
                    'matiere_id' => $request->matiere_id,
                ],
                [
                    'note' => $note
                ]
            );
        }

        return redirect()->back()->with('success', 'Notes enregistrées.');
    }
}
