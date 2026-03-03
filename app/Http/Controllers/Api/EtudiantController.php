<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{

    public function index()
    {
        return Etudiant::with('classe')->get();
    }

    public function show($id)
    {
        return Etudiant::with('classe')->findOrFail($id);
    }
}
