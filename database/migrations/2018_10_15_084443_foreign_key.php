<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collections', function($table) {
            $table->foreign('id_type')->references('id')->on('collection_types');
        });

        Schema::table('paint_prices', function($table) {
            $table->foreign('id_plume')->references('id')->on('plumes');
            $table->foreign('id_size')->references('id')->on('sizes');
            $table->foreign('id_paint')->references('id')->on('paintings');
        });
        
        Schema::table('paint_on_cols', function($table) {
            $table->foreign('id_paint')->references('id')->on('paintings');
            $table->foreign('id_col')->references('id')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
