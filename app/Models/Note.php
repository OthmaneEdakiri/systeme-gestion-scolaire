<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'note',
        'matiere_id',
        'etudiant_id'
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
