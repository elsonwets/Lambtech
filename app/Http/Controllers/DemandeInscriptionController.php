<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande_inscription;

class DemandeInscriptionController extends Controller
{
    /**
     * Affiche un formulaire pour créer une nouvelle demande d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('demande_inscription.create');
    }

    /**
     * Enregistre une nouvelle demande d'inscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider les données de la demande d'inscription
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'adresse' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
            'numero_tel' => 'nullable|string|max:20',
            'file' => 'nullable|file|max:10240', // Maximum 10 MB
        ]);

        // Créer une nouvelle demande d'inscription
        Demande_inscription::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'numero_tel' => $request->numero_tel,
            'file' => $request->file('file')->store('demande_inscriptions'), // Stocker le fichier dans le dossier demande_inscriptions
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('demande_inscription.create')->with('success', 'Votre demande d\'inscription a été soumise avec succès.');
    }
}
