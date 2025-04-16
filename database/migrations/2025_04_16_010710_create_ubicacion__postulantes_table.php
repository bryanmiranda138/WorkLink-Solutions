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
        Schema::create('ubicacion__postulantes', function (Blueprint $table) {
            $table->id('idUbicacionPostulante');
            $table->string('nomDepartamento', 25);
            $table->string('nomMunicipio', 25);
            $table->string('direccion', 100);
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
        Schema::dropIfExists('ubicacion__postulantes');
    }
};
