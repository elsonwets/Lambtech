<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    // Afficher la liste des étudiants
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    // Afficher le formulaire de création d'un nouvel étudiant
    public function create()
    {
        return view('etudiants.create');
    }

    // Enregistrer un nouvel étudiant dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'adresse' => 'required',
            'email' => 'required|email|unique:etudiants',
            'numero_tel' => 'required',
        ]);

        Etudiant::create($request->all());

        return redirect()->route('etudiants.index')
            ->with('success', 'Etudiant créé avec succès.');
    }

    // Afficher les détails d'un étudiant spécifique
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', compact('etudiant'));
    }

    // Afficher le formulaire pour éditer un étudiant spécifique
    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    // Mettre à jour les informations d'un étudiant spécifique dans la base de données
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'adresse' => 'required',
            'email' => 'required|email|unique:etudiants,email,'.$etudiant->id,
            'numero_tel' => 'required',
        ]);

        $etudiant->update($request->all());

        return redirect()->route('etudiants.index')
            ->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
    }

    // Supprimer un étudiant spécifique de la base de données
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiants.index')
            ->with('success', 'Etudiant supprimé avec succès.');
    }
}
