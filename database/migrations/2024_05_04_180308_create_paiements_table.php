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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->decimal('montant', 8, 2); // 8 chiffres au total, 2 chiffres après la virgule
            $table->string('mode_paiement');
            $table->string('mois_paiement');
            $table->date('date_paiement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
