<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjecutivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejecutivos', function (Blueprint $table) {
            $table->id();
            $table->integer('rut')->length(8);
            $table->char('dv',1);
            $table->string('nombre',200);
            $table->string('canal',10);
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
        Schema::dropIfExists('ejecutivos');
    }
}
