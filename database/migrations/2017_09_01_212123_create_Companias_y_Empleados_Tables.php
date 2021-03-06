<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateCompaniasyEmpleadosTables extends Migration
{

    public function up()
    {
        Schema::create('Cotz-Companias', function (Blueprint $table){
            $table->bigIncrements('cod_Companias');
            $table->string('nomb_Companias');
            $table->string('nit_Companias')->nullable();
            $table->string('tel_Companias')->nullable();
        });
        Schema::create('Cotz_Empleados', function (Blueprint $table){
            $table->bigIncrements('cod_Empleado');
            $table->string('documentoEmpleado', 10);
            $table->string('tipo_Doc_Empleado');
            $table->string('nombre_Empleado');
            $table->integer('sexo_Empleado');
            $table->date('fecha_Nac_Empleado');
            $table->string('telf_Celular_Empleado');
            $table->string('telf_Corporativo_Empleado');
            $table->string('email')->unique();
            $table->bigInteger('cod_Companias')->unsigned();
            $table->foreign('cod_Companias')->references('cod_Companias')->on('Cotz-Companias');
            $table->integer('porc_Descuento')->nullable();
            $table->integer('porc_Ganacia')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Cotz_Empleados');
        Schema::drop('Cotz-Companias');
    }
}
