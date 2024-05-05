<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'classe_id',
        'annee_scolaire_id',
    ];

    /**
     * Récupère l'étudiant inscrit.
     */
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    /**
     * Récupère la classe à laquelle l'étudiant est inscrit.
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    /**
     * Récupère l'année scolaire de l'inscription.
     */
    public function anneeScolaire()
    {
        return $this->belongsTo(Annee_scolaire::class, 'annee_scolaire_id');
    }
}
