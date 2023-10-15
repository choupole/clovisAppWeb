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
        Schema::create('prestation_paie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nprest');
            $table->unsignedBigInteger('npaie');
            $table->timestamps();

            $table->foreign('nprest')->references('nprest')->on('prestations')->onDelete('cascade');
            $table->foreign('npaie')->references('npaie')->on('paies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestation_paie');
    }
};
