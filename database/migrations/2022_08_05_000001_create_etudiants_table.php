<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('adresse', 100);
            $table->string('telephone', 100);
            $table->date('dateNaissance');
            $table->unsignedBigInteger('villes_id');
            $table->unsignedBigInteger('users_id');
            $table->timestamps();

            $table->unique('users_id');
            $table->foreign('villes_id')->references('id')->on('villes');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
