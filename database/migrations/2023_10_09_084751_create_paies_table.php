<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paies', function (Blueprint $table) {
            $table->id('npaie');
            $table->integer('mont');
            $table->date('datpaie');
            $table->string('coddir');
            $table->unsignedBigInteger('nens');
            $table->unsignedBigInteger('ndoc'); // Ajoutez cette ligne pour la clé étrangère vers le modèle Document
            $table->foreign('coddir')->references('coddir')->on('directions');
            $table->foreign('nens')->references('nens')->on('enseignants');
            $table->foreign('ndoc')->references('ndoc')->on('documents'); // Ajoutez cette ligne pour la clé étrangère vers le modèle Document
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paies');
    }
};
