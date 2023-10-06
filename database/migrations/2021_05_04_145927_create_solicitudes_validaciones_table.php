<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesValidacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_validaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_solicitud');
            $table->foreign('id_solicitud')->references('id')->on('solicitudes');
            $table->foreignId('id_validacion');
            $table->foreign('id_validacion')->references('id')->on('validaciones');
            // $table->boolean('estado');
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
        Schema::dropIfExists('solicitudes_validaciones');
    }
}
