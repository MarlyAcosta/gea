<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoUsuario extends Migration
{
    /**
     * Integrantes de cada grupo en un proyecto
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_grupo');
            $table->timestamps();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();


            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_grupo')->references('id')->on('grupo_trabajo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_usuario');
    }
}
