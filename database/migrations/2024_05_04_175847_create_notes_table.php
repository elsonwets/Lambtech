<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Affiche la liste de toutes les notes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle note.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Stocke une nouvelle note dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'matiere_id' => 'required|exists:matieres,id',
            'professeur_id' => 'required|exists:professeurs,id',
            'valeur_note' => 'required|numeric',
        ]);

        // Crée une nouvelle note
        Note::create($request->all());

        // Redirige l'utilisateur vers une page de confirmation ou de liste des notes
        return redirect()->route('notes.index')->with('success', 'Note ajoutée avec succès.');
    }

    /**
     * Affiche les détails d'une note spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Supprime la note spécifiée de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recherche la note
        $note = Note::findOrFail($id);

        // Supprime la note
        $note->delete();

        // Redirige l'utilisateur vers une page de confirmation ou de liste des notes
        return redirect()->route('notes.index')->with('success', 'Note supprimée avec succès.');
    }

};
