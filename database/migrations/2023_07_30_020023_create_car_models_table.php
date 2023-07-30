<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id');
            $table->string('name', 30);
            $table->string('image', 100);
            $table->integer('doors');
            $table->integer('seats');
            $table->boolean('air_bag');
            $table->boolean('abs');
            $table->timestamps();

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_models', function(Blueprint $table) {
            $table->dropForeign('manufacturer_id');
        });

        Schema::dropIfExists('car_models');
    }
}
