<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee_scolaire extends Model
{
    use HasFactory;
    protected $table = 'annee_scolaire';

    protected $fillable = [
        'annee',
        'date_debut',
        'date_fin',
    ];
}
