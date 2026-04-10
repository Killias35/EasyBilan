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
        Schema::create('reglements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_facture');
            $table->date('date_reglement')->nullable();
            $table->decimal('montant_regle', 12, 2)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();

            $table->foreign('id_facture')->references('id')->on('factures');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reglements');
    }

};
