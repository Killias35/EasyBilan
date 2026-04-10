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
        Schema::create('factures', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('id_devis');
            $table->string('description', 255)->nullable();
            $table->string('numero_situation', 50)->nullable();
            $table->string('pv_numero', 50)->nullable();
            $table->date('date_facture')->nullable();
            $table->decimal('sous_total', 12, 2)->nullable();
            $table->decimal('montant_facture', 12, 2)->nullable();
            $table->date('echeance')->nullable();
            $table->boolean('affacturage')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();

            $table->foreign('id_devis')->references('id')->on('devis');
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
    }

};
