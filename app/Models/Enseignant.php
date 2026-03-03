<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Enseignant extends Authenticatable
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'specialite'
    ];

    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);
    }
}
