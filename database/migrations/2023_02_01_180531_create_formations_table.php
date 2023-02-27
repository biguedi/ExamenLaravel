<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("duree");
            $table->text("descrition");
            $table->string("isStarted");
            $table->date("date_debut");
            $table->unsignedBigInteger('referentiel_id');
            $table->foreign('referentiel_id')->references('id')->on('referentiels')->onDelete('cascade')
             ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');
    }
};
