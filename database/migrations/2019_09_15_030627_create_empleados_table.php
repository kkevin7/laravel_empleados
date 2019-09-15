<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Crearemos la tabla empleados
        Schema::create('empleados', function (Blueprint $table) {
            //Aquí definieremos los campos de la tabla
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->string('telefono');
            $table->string('foto');
            //Esta forma utiliza Laravel para manejar las fechas de creación
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //El metodo para eliminación de tablas
        Schema::dropIfExists('empleados');
    }
}
