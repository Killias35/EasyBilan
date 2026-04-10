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
        Schema::create('devis_materiaux', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devis_id');
            $table->foreignId('materiaux_id');
            $table->integer('quantite');
            $table->integer('prix');
            $table->integer('tva');

            $table->timestamps();
            $table->foreign('devis_id')->references('id')->on('devis');
            $table->foreign('materiaux_id')->references('id')->on('materiaux');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis_materiaux');
    }
};
