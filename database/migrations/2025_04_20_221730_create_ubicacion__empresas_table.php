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
        Schema::create('ubicacion__empresas', function (Blueprint $table) {
            $table->id('idUbicacionEmpresa');
            $table->string('nomDepartamento', 25);
            $table->string('nomMunicipio', 25);
            $table->string('direccion', 100);
            $table->unsignedBigInteger('empresa_id'); 
            $table->timestamps();

            $table->foreign('empresa_id')
            ->references('idEmpresa')
            ->on('empresas')
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
        Schema::dropIfExists('ubicacion__empresas');
    }
};
