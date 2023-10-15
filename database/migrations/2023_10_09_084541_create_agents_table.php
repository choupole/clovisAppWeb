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
        Schema::create('agents', function (Blueprint $table) {
            $table->id('matri');
            $table->string('nom');
            $table->string('postnom')->nullable();
            $table->string('prenom');
            $table->string('sexe');
            $table->string('coddir'); // Modifiez le type en string
            $table->foreign('coddir')->references('coddir')->on('directions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
