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
        Schema::create('paie_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('npaie');
            $table->unsignedBigInteger('ndoc');
            $table->timestamps();

            $table->foreign('npaie')->references('npaie')->on('paies')->onDelete('cascade');
            $table->foreign('ndoc')->references('ndoc')->on('documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paie_document');
    }
};
