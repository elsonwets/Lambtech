<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    // Afficher la liste des annonces
    public function index()
    {
        $annonces = Annonce::all();
        return view('annonces.index', compact('annonces'));
    }

    // Afficher le formulaire de création d'une nouvelle annonce
    public function create()
    {
        return view('annonces.create');
    }

    // Enregistrer une nouvelle annonce dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'date_publication' => 'required|date',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        Annonce::create($request->all());

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce créée avec succès.');
    }

    // Afficher les détails d'une annonce spécifique
    public function show(Annonce $annonce)
    {
        return view('annonces.show', compact('annonce'));
    }

    // Afficher le formulaire pour éditer une annonce spécifique
    public function edit(Annonce $annonce)
    {
        return view('annonces.edit', compact('annonce'));
    }

    // Mettre à jour les informations d'une annonce spécifique dans la base de données
    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'date_publication' => 'required|date',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        $annonce->update($request->all());

        return redirect()->route('annonces.index')
            ->with('success', 'Informations de l\'annonce mises à jour avec succès.');
    }

    // Supprimer une annonce spécifique de la base de données
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce supprimée avec succès.');
    }
}
