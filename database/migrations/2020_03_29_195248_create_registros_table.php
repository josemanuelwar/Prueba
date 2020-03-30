<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id('ID_REGI',10);
            $table->string('NOMBRE_REGI');
            $table->string('RFC_REGI');
            $table->string('CORREO_REGI');
            $table->string('DIRECCION_REGI');
            $table->longText('COMENTARIOS_REGI');
            $table->float('LATIDTUD_REGI')->nullable();
            $table->float('LONGITUD_REGI')->nullable();
            $table->timestamps();
            $table->unique('CORREO_REGI');
            $table->unique('RFC_REGI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
