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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expediteur_id');
            $table->unsignedBigInteger('destinataire_id');
            $table->text('contenu');
            $table->timestamp('date_envoi')->nullable();
            $table->timestamps();

            // Clés étrangères
            $table->foreign('expediteur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('destinataire_id')->references('id')->on('utilisateurs')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
