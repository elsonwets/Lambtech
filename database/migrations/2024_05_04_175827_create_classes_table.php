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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('niveau');
            $table->string('nom_classe');
            $table->unsignedBigInteger('annee_scolaire_id');
            $table->timestamps();

            // Contrainte de clé étrangère
            $table->foreign('annee_scolaire_id')->references('id')->on('annee_scolaires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
