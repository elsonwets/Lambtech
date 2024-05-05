<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Affiche la liste de toutes les conversations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::all();
        return view('conversations.index', compact('conversations'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle conversation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conversations.create');
    }

    /**
     * Stocke une nouvelle conversation dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'utilisateur1_id' => 'required|exists:utilisateurs,id',
            'utilisateur2_id' => 'required|exists:utilisateurs,id',
        ]);

        // Crée une nouvelle conversation
        Conversation::create($request->all());

        // Redirige l'utilisateur vers une page de confirmation ou de liste des conversations
        return redirect()->route('conversations.index')->with('success', 'Conversation ajoutée avec succès.');
    }

    /**
     * Affiche les détails d'une conversation spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conversation = Conversation::findOrFail($id);
        return view('conversations.show', compact('conversation'));
    }

    /**
     * Supprime la conversation spécifiée de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche la conversation
        $conversation = Conversation::findOrFail($id);

        // Supprime la conversation
        $conversation->delete();

        // Redirige l'utilisateur vers une page de confirmation ou de liste des conversations
        return redirect()->route('conversations.index')->with('success', 'Conversation supprimée avec succès.');
    }

}
