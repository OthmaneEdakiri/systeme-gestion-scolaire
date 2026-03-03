<?php

use App\Http\Controllers\Api\EtudiantController;
use Illuminate\Support\Facades\Route;

Route::get('etudiants', [EtudiantController::class, 'index']);
Route::get('etudiants/{id}', [EtudiantController::class, 'show']);
