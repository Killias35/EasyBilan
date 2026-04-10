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
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->string('civilite', 50)->nullable();
            $table->string('nom_client', 255)->nullable();
            $table->string('adresse_client', 255)->nullable();
            $table->string('code_postal_client', 20)->nullable();
            $table->string('ville_client', 100)->nullable();
            $table->string('tel', 50)->nullable();
            $table->string('tva_intra', 50)->nullable();
            $table->string('rcs', 100)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 26001;");
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }

};
