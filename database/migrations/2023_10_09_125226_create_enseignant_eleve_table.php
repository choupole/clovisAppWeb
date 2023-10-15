<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('enseignant_eleve', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nens');
            $table->unsignedBigInteger('nelev');
            $table->timestamps();

            $table->foreign('nens')->references('nens')->on('enseignants')->onDelete('cascade');
            $table->foreign('nelev')->references('nelev')->on('eleves')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_eleve');
    }
};
