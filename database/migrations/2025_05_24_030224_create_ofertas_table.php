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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id('idOferta');
            $table->string('tituloOferta', 50);
            $table->string('descOferta', 300);
            $table->string('requisitos', 300);
            $table->string('salario', 25);
            $table->string('modalidad', 25);
            $table->string('ubicacion', 50);
            $table->date('fechaPublicacion');
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
        Schema::dropIfExists('ofertas');
    }
};
