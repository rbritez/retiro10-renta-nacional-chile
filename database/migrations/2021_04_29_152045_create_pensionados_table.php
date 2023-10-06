<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensionadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensionados', function (Blueprint $table) {
            $table->id();
            //$table->float('rut',10);
            $table->integer('rut')->length(8);
            $table->char('dv',1);
            $table->string('tipo',12);
            //$table->float('tope_retiro');
            $table->float('tope_retiro', 6, 3);
            $table->integer('rut_titular')->length(8)->nullable()->default(NULL);
            $table->char('dv_titular',1)->nullable()->default(NULL);
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
        Schema::dropIfExists('pensionados');
    }
}
