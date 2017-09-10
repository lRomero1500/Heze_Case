<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cotz_Tipo_Documento', function (Blueprint $table){
            $table->increments('tipo_Doc_Empleado');
            $table->string('nom_Tipo_Documento');
        });
        Schema::table('Cotz_Empleados', function(Blueprint $table){

            $table->integer('tipo_Doc_Empleado')->unsigned()->change();
            $table->foreign('tipo_Doc_Empleado')->references('tipo_Doc_Empleado')->on('Cotz_Tipo_Documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Cotz_Tipo_Documento');
    }
}
