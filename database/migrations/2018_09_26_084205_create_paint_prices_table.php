<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paint_prices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('id_plume');
            $table->unsignedInteger('id_size');
            $table->unsignedInteger('id_paint');
            $table->integer('price');
            $table->foreign('id_plume')->references('id')->on('plumes');
            $table->foreign('id_size')->references('id')->on('sizes');
            $table->foreign('id_paint')->references('id')->on('paintings');
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
        Schema::dropIfExists('paint_prices');
    }
}
