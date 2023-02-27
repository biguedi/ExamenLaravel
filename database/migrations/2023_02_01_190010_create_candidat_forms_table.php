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
        Schema::create('candidat_forms', function (Blueprint $table) {
            $table->unsignedBigInteger('formation_id');
            $table->unsignedBigInteger('candidat_id');
            $table->timestamps();
        
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidat_forms');
    }
};
