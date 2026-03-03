<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalStudents = Etudiant::count();
        $totalClasses = Classe::count();
        $totalSubjects = Matiere::count();
        $totalTeachers = Enseignant::count();

        // Overall average for the school
        $overallAverage = Etudiant::all()
            ->avg(function ($etudiant) {
                return $etudiant->moyenne;
            });

        // Class with the highest average
        $classesWithAverages = Classe::with('etudiants')->get()
            ->map(function ($classe) {
                $classe->moyenne = $classe->etudiants->avg(function ($etudiant) {
                    return $etudiant->moyenne;
                });
                return $classe;
            });

        $classes = Classe::with('etudiants')->get();

        $bestClass = Classe::with('etudiants.notes.matiere')
            ->get()
            ->map(function ($classe) {
                $classe->moyenne = $classe->etudiants->avg(function ($etudiant) {
                    return $etudiant->moyenne;
                });
                return $classe;
            })
            ->sortByDesc('moyenne')
            ->first();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalClasses',
            'totalSubjects',
            'totalTeachers',
            'overallAverage',
            'bestClass'
        ));
    }
}
