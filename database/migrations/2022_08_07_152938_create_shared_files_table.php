<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_files', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100)->nullable();
            $table->string('titre_fr', 100)->nullable();
            $table->string('file_path', 100);
            $table->unsignedBigInteger('etudiants_id');
            $table->timestamps();

            $table->foreign('etudiants_id')->references('id')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_files');
    }
}
