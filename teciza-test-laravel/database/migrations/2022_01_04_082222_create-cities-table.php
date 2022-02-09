<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_cities', function (Blueprint $table){
            $table->id('id');
            $table->string('city_name');
            $table->string('city_code', 10);
            $table->bigInteger('state_id', false, true);
            $table->foreign('state_id')->references('id')->on('master_states')->cascadeOnDelete()->restrictOnUpdate();
            $table->float('city_latitude');
            $table->float('city_logitude');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
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
