<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'nom',
        'prenom',
        'adresse',
        'email',
        'numero_tel',
    ];

    /**
     * Récupère l'utilisateur associé au professeur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
