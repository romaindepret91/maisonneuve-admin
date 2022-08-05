<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogposts', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100)->nullable();
            $table->string('titre_fr', 100)->nullable();
            $table->text('body')->nullable();
            $table->text('body_fr')->nullable();
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
        Schema::dropIfExists('blogposts');
    }
}
