<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->integer('rut')->length(8);
            // $table->integer('rut')->length(10);
            $table->char('dv',1);
            $table->string('num_serie',20);
            $table->string('nombre',200);
            $table->string('apellido_paterno',100);
            $table->string('apellido_materno',100);
            $table->date('fecha_nacimiento');
            $table->timestamps();
            // $table->engine='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitantes');
    }
}
