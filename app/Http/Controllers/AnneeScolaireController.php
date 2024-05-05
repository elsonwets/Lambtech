<?php

namespace App\Http\Controllers;

use App\Models\Annee_scolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    // Afficher la liste des années scolaires
    public function index()
    {
        $anneesScolaires = Annee_scolaire::all();
        return view('annees_scolaires.index', compact('anneesScolaires'));
    }

    // Afficher le formulaire de création d'une nouvelle année scolaire
    public function create()
    {
        return view('annees_scolaires.create');
    }

    // Enregistrer une nouvelle année scolaire dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'annee' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        Annee_scolaire::create($request->all());

        return redirect()->route('annees_scolaires.index')
            ->with('success', 'Année scolaire créée avec succès.');
    }

    // Afficher les détails d'une année scolaire spécifique
    public function show(Annee_scolaire $anneeScolaire)
    {
        return view('annees_scolaires.show', compact('anneeScolaire'));
    }

    // Afficher le formulaire pour éditer une année scolaire spécifique
    public function edit(Annee_scolaire $anneeScolaire)
    {
        return view('annees_scolaires.edit', compact('anneeScolaire'));
    }

    // Mettre à jour les informations d'une année scolaire spécifique dans la base de données
    public function update(Request $request, Annee_scolaire $anneeScolaire)
    {
        $request->validate([
            'annee' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $anneeScolaire->update($request->all());

        return redirect()->route('annees_scolaires.index')
            ->with('success', 'Informations de l\'année scolaire mises à jour avec succès.');
    }

    // Supprimer une année scolaire spécifique de la base de données
    public function destroy(Annee_scolaire $anneeScolaire)
    {
        $anneeScolaire->delete();

        return redirect()->route('annees_scolaires.index')
            ->with('success', 'Année scolaire supprimée avec succès.');
    }
}
