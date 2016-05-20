<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('workex_id');
            $table->foreign('workex_id')->references('id')->on('workout_exercise');
            $table->integer('weigth');
            $table->integer('reps');
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
        Schema::drop('sets');
    }
}
