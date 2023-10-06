<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('poliza',10);
            $table->integer('rut')->length(8);
            $table->char('dv',1);
            $table->char('parentesco',1);
            $table->char('estado_solicitud',2);
            $table->float('monto_reservado',5,2);
            $table->float('renta_anual',5,2);
            $table->string('telefono1',15);
            $table->string('telefono2',15);
            $table->string('email1',60);
            $table->string('email2',60);
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
        Schema::dropIfExists('beneficiarios');
    }
}
