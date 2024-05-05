<?php

namespace App\Http\Controllers;

use App\Models\Tuteur;
use Illuminate\Http\Request;

class TuteurController extends Controller
{
    // Afficher la liste des tuteurs
    public function index()
    {
        $tuteurs = Tuteur::all();
        return view('tuteurs.index', compact('tuteurs'));
    }

    // Afficher le formulaire de création d'un nouveau tuteur
    public function create()
    {
        return view('tuteurs.create');
    }

    // Enregistrer un nouveau tuteur dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prénom' => 'required',
            'email' => 'required|email|unique:tuteurs',
        ]);

        Tuteur::create($request->all());

        return redirect()->route('tuteurs.index')
            ->with('success', 'Tuteur créé avec succès.');
    }

    // Afficher les détails d'un tuteur spécifique
    public function show(Tuteur $tuteur)
    {
        return view('tuteurs.show', compact('tuteur'));
    }

    // Afficher le formulaire pour éditer un tuteur spécifique
    public function edit(Tuteur $tuteur)
    {
        return view('tuteurs.edit', compact('tuteur'));
    }

    // Mettre à jour les informations d'un tuteur spécifique dans la base de données
    public function update(Request $request, Tuteur $tuteur)
    {
        $request->validate([
            'nom' => 'required',
            'prénom' => 'required',
            'email' => 'required|email|unique:tuteurs,email,'.$tuteur->id,
        ]);

        $tuteur->update($request->all());

        return redirect()->route('tuteurs.index')
            ->with('success', 'Informations du tuteur mises à jour avec succès.');
    }

    // Supprimer un tuteur spécifique de la base de données
    public function destroy(Tuteur $tuteur)
    {
        $tuteur->delete();

        return redirect()->route('tuteurs.index')
            ->with('success', 'Tuteur supprimé avec succès.');
    }
}
