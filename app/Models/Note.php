<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'matiere_id',
        'professeur_id',
        'valeur_note',
    ];

    /**
     * Récupère l'étudiant auquel appartient la note.
     */
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    /**
     * Récupère la matière de la note.
     */
    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    /**
     * Récupère le professeur ayant attribué la note.
     */
    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'professeur_id');
    }
}
