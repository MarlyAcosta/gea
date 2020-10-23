<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_rol');
            $table->timestamps();

            // ---- FK's ----
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_rol')->references('id')->on('roles');
        });
        DB::table('usuario_roles')
        ->insert([
            [
                'id_user' => 1,
                'id_rol' => 1,
            ],
            [
                'id_user' => 1,
                'id_rol' => 2,
            ],
            [
                'id_user' => 1,
                'id_rol' => 3,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_roles');
    }
}
