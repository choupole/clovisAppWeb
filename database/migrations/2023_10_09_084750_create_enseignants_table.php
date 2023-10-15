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
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id('nens');
            $table->string('nom');
            $table->string('postnom')->nullable();
            $table->string('prenom');
            $table->string('sexe');
            $table->string('codcais'); // Modifiez le type en string
            $table->foreign('codcais')->references('codcais')->on('caisses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};
