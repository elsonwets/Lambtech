<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
                       
$table->id();
            
       
$table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('professeur_id');
            $table->float('valeur_note');
            $table->timestamps();
           // Foreign key constraints  
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('professeur_id')->references('id')->on('professeurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
