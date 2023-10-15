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
        Schema::create('enseignant_prestation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nens');
            $table->unsignedBigInteger('nprest');
            $table->timestamps();

            $table->foreign('nens')->references('nens')->on('enseignants')->onDelete('cascade');
            $table->foreign('nprest')->references('nprest')->on('prestations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_prestation');
    }
};
