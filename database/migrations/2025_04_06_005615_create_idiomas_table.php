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
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id('idIdioma');
            $table->string('idioma', 25);
            $table->string('nivel', 25);
            $table->unsignedBigInteger('postulante_id');
            $table->timestamps();

            $table->foreign('postulante_id')
            ->references('idPostulante')
            ->on('postulantes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idiomas');
    }
};
