<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo', function (Blueprint $table) {
            $table->increments('idInsumo');

            $table->string('nombreInsumo')->nullable();
            $table->string('marcInsumo')->nullable();
            $table->string('fvInsumo')->nullable();
            $table->double('precInsumo')->nullable();
            $table->double('stock')->nullable();
            $table->double('stockPromedio')->nullable();
            $table->double('stockMinimo')->nullable();
            $table->string('desInsumo')->nullable();
            $table->string('catInsumo')->nullable();
            $table->double('cantInsumo')->nullable();
            $table->string('umInsumo')->nullable();

            $table->integer('idReceta')->unsigned();
            $table->foreign('idReceta')->references('idReceta')->on('receta')->onDelete('cascade');

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
        Schema::dropIfExists('insumo');
    }
}
