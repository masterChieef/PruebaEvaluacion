<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasVsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_vs_items', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->unsignedInteger('item_id');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id')->on('pregunta')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('restrict')->onUpdate('restrict');
            $table->Integer('valor'); 
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
        Schema::dropIfExists('preguntas_vs_items');
    }
}
