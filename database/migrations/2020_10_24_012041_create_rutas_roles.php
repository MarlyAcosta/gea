<?php

use App\Enums\EPermisosRutas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRutasRoles extends Migration
{
    /**
     * Los permisos que tienen los roles sobre ciertas rutas del programa
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rutas_roles')){
            Schema::create('rutas_roles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_ruta');
                $table->unsignedBigInteger('id_rol');
                $table->tinyInteger('tipo_permiso')->default(EPermisosRutas::getIndex(EPermisosRutas::TODOS)->getId());
                $table->timestamps();
                //FKs
                $table->foreign('id_ruta')->references('id')->on('rutas');
                $table->foreign('id_rol')->references('id')->on('roles');
            });
            $roles = DB::table('roles')->get();
            $rutas = DB::table('rutas')->get();
            foreach($roles as $rol){
                foreach($rutas as $rut){
                    DB::table('rutas_roles')
                    ->insert([
                        'id_ruta' => $rut->id,
                        'id_rol' => $rol->id,
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
