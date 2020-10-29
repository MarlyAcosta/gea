<?php

use App\Enums\EActivo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('roles')){
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->longText('descripcion')->nullable();
                $table->tinyInteger('activo')->default(EActivo::getIndex(EActivo::ACTIVO));
            });
            DB::table('roles')
            ->insert([
                [
                    'nombre' => 'Administrador'
                ],
                [
                    'nombre' => 'Invitado'
                ],
                [
                    'nombre' => 'Analista'
                ]
            ]);
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
