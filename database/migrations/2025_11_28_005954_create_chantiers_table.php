<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chantiers', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('id_devis');
            $table->string('nom_chantier', 255)->nullable();
            $table->string('adresse_chantier', 255)->nullable();
            $table->string('code_postal_chantier', 20)->nullable();
            $table->string('ville_chantier', 100)->nullable();
            $table->string('conducteur', 255)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();

            $table->foreign('id_devis')->references('id')->on('devis');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chantiers');
    }

};
