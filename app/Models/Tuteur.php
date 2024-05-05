<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
    use HasFactory;
    /**
     * Les attributs qui sont assignables massivement.
     *
     * @var array
     */
    protected $fillable = [
        'utilisateur_id',
        'nom',
        'prénom',
        'adresse',
        'email',
        'numéro_tel',
    ];

    /**
     * Obtenir l'utilisateur associé à ce tuteur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
