<?php

use App\Enums\EEncapsulamientoRutas;
use App\Util\Utilities;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRutas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('ruta_completa');
            $table->string('ruta_nombre')->nullable();
            $table->string('verbo_http');

            //Define si la ruta es pública, protegida o privada
            $table->tinyInteger('encapsulamiento')->default(EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PUBLICA)->getId());
        });
        $rutas = Utilities::getAllRoutes();
        foreach($rutas as $r){
            $ruta = new stdClass;
            $ruta->ruta_completa = $r->uri;
            $ruta->ruta_nombre = $r->getName();
            $ruta->encapsulamiento = EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PUBLICA)->getId();
            $ruta->verbo_http = $r->methods()[0];
            DB::table('rutas')
            ->insert([
                'ruta_completa' => $ruta->ruta_completa,
                'ruta_nombre' => $ruta->ruta_nombre,
                'encapsulamiento' => $ruta->encapsulamiento,
                'verbo_http' => $ruta->verbo_http
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
        Schema::dropIfExists('rutas');
    }
}
