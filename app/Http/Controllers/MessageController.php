<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Affiche la liste de tous les messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ton code pour afficher le formulaire de création de message
    }

    /**
     * Stocke un nouveau message dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'expediteur_id' => 'required|exists:utilisateurs,id',
            'destinataire_id' => 'required|exists:utilisateurs,id',
            'contenu' => 'required|string',
            'date_envoi' => 'nullable|date',
        ]);

        // Crée un nouveau message
        Message::create($request->all());

        // Redirige l'utilisateur vers une page de confirmation ou de liste des messages
        return redirect()->route('messages.index')->with('success', 'Message envoyé avec succès.');
    }

    /**
     * Affiche les détails d'un message spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Supprime le message spécifié de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche le message
        $message = Message::findOrFail($id);

        // Supprime le message
        $message->delete();

        // Redirige l'utilisateur vers une page de confirmation ou de liste des messages
        return redirect()->route('messages.index')->with('success', 'Message supprimé avec succès.');
    }

}
