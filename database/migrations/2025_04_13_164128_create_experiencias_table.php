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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id('idExperiencia');
            $table->string('puesto', 25);
            $table->string('empresa', 50);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('contactoEmpresa', 50)->nullable();   
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
        Schema::dropIfExists('experiencias');
    }
};
