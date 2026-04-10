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
            $table->integer('sous_devis')->default(1);
            $table->integer('quantite')->default(1);
            $table->decimal('prix', 12, 2)->nullable();
            $table->decimal('tva', 12, 2)->nullable();

            $table->timestamps();
            $table->foreign('devis_id')->references('id')->on('devis')->cascadeOnDelete();
            $table->foreign('materiel_id')->references('id')->on('materiel')->cascadeOnDelete();
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
