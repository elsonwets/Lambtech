<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    // Afficher la liste des classes
    public function index()
    {
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }

    // Afficher le formulaire de création d'une nouvelle classe
    public function create()
    {
        return view('classes.create');
    }

    // Enregistrer une nouvelle classe dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'niveau' => 'required',
            'nom_classe' => 'required',
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',
        ]);

        Classe::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Classe créée avec succès.');
    }

    // Afficher les détails d'une classe spécifique
    public function show(Classe $classe)
    {
        return view('classes.show', compact('classe'));
    }

    // Afficher le formulaire pour éditer une classe spécifique
    public function edit(Classe $classe)
    {
        return view('classes.edit', compact('classe'));
    }

    // Mettre à jour les informations d'une classe spécifique dans la base de données
    public function update(Request $request, Classe $classe)
    {
        $request->validate([
            'niveau' => 'required',
            'nom_classe' => 'required',
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',
        ]);

        $classe->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Informations de la classe mises à jour avec succès.');
    }

    // Supprimer une classe spécifique de la base de données
    public function destroy(Classe $classe)
    {
        $classe->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Classe supprimée avec succès.');
    }
}
