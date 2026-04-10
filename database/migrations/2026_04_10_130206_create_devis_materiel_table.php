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
        Schema::create('devis_materiel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devis_id');
            $table->foreignId('materiel_id');
            $table->integer('quantite');
            $table->integer('prix');
            $table->integer('tva');

            $table->timestamps();
            $table->foreign('devis_id')->references('id')->on('devis');
            $table->foreign('materiel_id')->references('id')->on('materiel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis_materiel');
    }
};
