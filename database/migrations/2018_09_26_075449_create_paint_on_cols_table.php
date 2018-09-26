<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintOnColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paint_on_cols', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_col');
            $table->unsignedInteger('id_paint');
            $table->foreign('id_paint')->references('id')->on('paintings');
            $table->foreign('id_col')->references('id')->on('collections');
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
        Schema::dropIfExists('paint_on_cols');
    }
}
