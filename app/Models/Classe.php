<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    /**
     * Les attributs qui sont assignables massivement.
     *
     * @var array
     */
    protected $fillable = [
        'niveau',
        'nom_classe',
        'annee_scolaire_id',
    ];

    /**
     * Obtenir l'année scolaire associée à cette classe.
     */
    public function anneeScolaire()
    {
        return $this->belongsTo(Annee_scolaire::class);
    }
}
