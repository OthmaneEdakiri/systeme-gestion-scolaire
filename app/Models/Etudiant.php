<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Etudiant extends Authenticatable
{

    use SoftDeletes, HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'date_naissance',
        'password',
        'classe_id'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function getMoyenneAttribute()
    {
        $total = 0;
        $coefTotal = 0;

        foreach ($this->notes()->with('matiere')->get() as $note) {

            if ($note->note !== null) {

                $coefficient = $note->matiere->coefficient;

                $total += $note->note * $coefficient;
                $coefTotal += $coefficient;
            }
        }

        return $coefTotal > 0
            ? round($total / $coefTotal, 2)
            : 0;
    }

    public function getStatutAttribute()
    {
        return $this->moyenne >= 10
            ? 'Admis'
            : 'Ajourné';
    }

    public function getMentionAttribute()
    {
        $m = $this->moyenne;

        if ($m >= 16) return 'Très Bien';
        if ($m >= 14) return 'Bien';
        if ($m >= 12) return 'Assez Bien';
        if ($m >= 10) return 'Passable';

        return 'Ajourné';
    }
}
