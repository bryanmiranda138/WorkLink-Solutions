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
        Schema::create('logros', function (Blueprint $table) {
            $table->id('idLogro');
            $table->string('descLogro', 100);
            $table->date('fechaLogro');
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
        Schema::dropIfExists('logros');
    }
};
