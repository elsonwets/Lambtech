<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAcademique extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'description',
        'fichier',
    ];

    /**
     * Récupère l'étudiant auquel le document académique est associé.
     */
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
