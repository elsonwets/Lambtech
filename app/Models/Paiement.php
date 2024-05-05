<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'etudiant_id',
        'montant',
        'mode_paiement',
        'mois_paiement',
        'date_paiement',
    ];

    /**
     * Récupère l'étudiant effectuant le paiement.
     */
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
