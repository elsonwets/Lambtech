<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::all();
        return view('paiements.index', compact('paiements'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau paiement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paiements.create');
    }

    /**
     * Stocke un nouveau paiement dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'montant' => 'required|numeric',
            'mode_paiement' => 'required',
            'mois_paiement' => 'required',
            'date_paiement' => 'required|date',
        ]);

        // Crée un nouveau paiement
        Paiement::create($request->all());

        // Redirige l'utilisateur vers une page de confirmation ou de liste des paiements
        return redirect()->route('paiements.index')->with('success', 'Paiement ajouté avec succès.');
    }

    /**
     * Affiche les détails d'un paiement spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paiement = Paiement::findOrFail($id);
        return view('paiements.show', compact('paiement'));
    }

    /**
     * Affiche le formulaire de mise à jour d'un paiement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paiement = Paiement::findOrFail($id);
        return view('paiements.edit', compact('paiement'));
    }

    /**
     * Met à jour le paiement dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valide les données du formulaire
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'montant' => 'required|numeric',
            'mode_paiement' => 'required',
            'mois_paiement' => 'required',
            'date_paiement' => 'required|date',
        ]);

        // Met à jour le paiement
        $paiement = Paiement::findOrFail($id);
        $paiement->update($request->all());

        // Redirige l'utilisateur vers une page de confirmation ou de liste des paiements
        return redirect()->route('paiements.index')->with('success', 'Paiement mis à jour avec succès.');
    }

    /**
     * Supprime le paiement spécifié de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche le paiement
        $paiement = Paiement::findOrFail($id);

        // Supprime le paiement
        $paiement->delete();

        // Redirige l'utilisateur vers une page de confirmation ou de liste des paiements
        return redirect()->route('paiements.index')->with('success', 'Paiement supprimé avec succès.');
    }

}
