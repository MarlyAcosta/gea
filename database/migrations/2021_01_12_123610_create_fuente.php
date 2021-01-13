<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('id_metodologia');
            $table->dateTime('creado_en')->default(Carbon::now());
            $table->dateTime('modificado_en');

            //FKs
            $table->foreign('id_metodologia')->references('id')->on('metodologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuente');
    }
}
