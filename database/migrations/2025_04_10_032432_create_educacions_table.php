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
        Schema::create('educaciones', function (Blueprint $table) {
            $table->id('idEducacion');
            $table->string('titulo', 50);
            $table->string('institucion', 50);
            $table->date('fechaInicio');
            $table->date('fechaFin');
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
        Schema::dropIfExists('educaciones');
    }
};
