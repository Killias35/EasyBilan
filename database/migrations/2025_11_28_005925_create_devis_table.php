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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client');
            
            $table->date('date_devis')->nullable();
            $table->date('duree_validite')->nullable();

            $table->decimal('sous_total', 12, 2)->nullable();   // auto
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            
            $table->foreign('id_client')->references('id')->on('clients');
        });
    }

    public function down()
    {
        Schema::dropIfExists('devis');
    }

};
