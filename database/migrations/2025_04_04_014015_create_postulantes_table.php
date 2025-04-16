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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id('idPostulante');
            $table->string('dui', 10);
            $table->string('genero', 10);
            $table->date('fechaNacimiento');
            $table->string('primerNombre', 25);
            $table->string('segundoNombre', 25)->nullable();
            $table->string('primerApellido', 25);
            $table->string('segundoApellido', 25)->nullable();
            $table->string('numTelefono', 8);
            $table->string('email', 50);
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
        Schema::dropIfExists('postulantes');
    }
};
