<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio',10);
            $table->foreignId('id_solicitante');
            //$table->integer('id_solicitante')->length(10)->unsigned();
            $table->foreign('id_solicitante')->references('id')->on('solicitantes');
            $table->string('email',255);
            // $table->float('celular',11);
            $table->string('celular',15);
            $table->string('region',100);
            $table->string('comuna',100);
            $table->string('direccion',100);
            // $table->float('rut_pensionado',10);
            $table->integer('rut_pensionado')->length(8);
            $table->char('dv_pensionado',1);
            $table->string('rut_apoderado',11)->nullable();
            $table->string('ip_origen',50)->nullable();
            $table->integer('porc_retiro')->nullable();
            $table->float('monto_retiro',7,3)->nullable();
            $table->boolean('deudor_alimentos');
            $table->boolean('aceptar_condiciones');
            $table->tinyInteger('estado');
            $table->tinyInteger('motivo_rechazo')->nullable();
            $table->datetime('fecha_solicitud');
            $table->datetime('fecha_aceptado')->nullable();
            $table->datetime('fecha_confirmacion')->nullable();
            $table->datetime('fecha_rechazado')->nullable();
            $table->datetime('fecha_pagado')->nullable();
            $table->integer('codigo_ejecutivo')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
}
