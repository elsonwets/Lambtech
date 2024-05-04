<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class UtilisateurController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Affiche le formulaire de création d'un nouvel utilisateur.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('utilisateurs.create');
    }

    /**
     * Stocke un nouvel utilisateur dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_utilisateur' => 'required|unique:utilisateurs',
            'email' => 'required|email|unique:utilisateurs',
            'mot_de_passe' => 'required',
            'role' => 'required|in:administrateur,enseignant,etudiant,parent',
        ]);

        Utilisateur::create($request->all());

        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Affiche les détails d'un utilisateur spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Affiche le formulaire de modification d'un utilisateur.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    /**
     * Met à jour les informations d'un utilisateur dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_utilisateur' => 'required|unique:utilisateurs,nom_utilisateur,' . $id,
            'email' => 'required|email|unique:utilisateurs,email,' . $id,
            'mot_de_passe' => 'required',
            'role' => 'required|in:administrateur,enseignant,etudiant,parent',
        ]);

        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update($request->all());

        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur supprimé avec succès.');
    }
}
