<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailies', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->integer('category_id');
            $table->string('date');
            $table->time('time');
            $table->integer('pm10');
            $table->integer('pm25');
            $table->integer('so2');
            $table->integer('co');
            $table->integer('o3');
            $table->integer('no2');
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
        Schema::dropIfExists('dailies');
    }
};
