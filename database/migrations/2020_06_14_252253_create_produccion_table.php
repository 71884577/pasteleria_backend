<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccion', function (Blueprint $table) {
            $table->increments('idProduccion');

            $table->string('cantProduccion')->nullable();
            $table->date('fecha')->nullable();
            $table->double('peso')->nullable();
            $table->string('nombreInsumo')->nullable();

            $table->integer('idReceta')->unsigned();
            $table->foreign('idReceta')->references('idReceta')->on('receta')->onDelete('cascade');

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produccion');
    }
}
