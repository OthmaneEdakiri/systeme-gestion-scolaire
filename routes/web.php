<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("login");
});


Route::middleware('auth:admin')
    ->prefix('dashboard')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Classes routes
        Route::resource('classes', ClasseController::class);

        // Enseignants routes
        Route::resource('enseignants', EnseignantController::class);

        // Etudiants routes
        Route::resource('etudiants', EtudiantController::class);

        // Matieres routes
        Route::resource('matieres', MatiereController::class);

        // Classement route
        Route::get("/classement", [EtudiantController::class, 'classement'])->name("classement.index");

        // Notes Routes
        Route::get("/notes", [NoteController::class, 'index'])->name("notes.index");
        Route::post("/notes/save", [NoteController::class, 'save'])->name("notes.save");
    });

Route::middleware('auth:etudiant')
    ->prefix('etudiant')
    ->name("etudiant.")
    ->group(function () {

        Route::get('/dashboard', [EtudiantController::class, 'dashboard'])->name("dashboard");
        Route::get('/dashboard/notes', [EtudiantController::class, 'notes'])->name("notes");

        Route::get(
            '/notes/export/{etudiant}',
            [EtudiantController::class, 'exportReleveNote']
        )->name('notes.export');
    });

Route::middleware('auth:enseignant')
    ->prefix('enseignant')
    ->name("enseignant.")
    ->group(function () {

        Route::get('/dashboard', [EnseignantController::class, 'dashboard'])->name("dashboard");
        Route::get('/dashboard/matieres', [EnseignantController::class, 'matieres'])->name("matieres");
    });


require __DIR__ . '/auth.php';
