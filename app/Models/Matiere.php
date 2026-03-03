<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = ['nom', 'coefficient'];

    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }
}
