<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('description');
            $table->string('type'); //full apartment/house, room, couch
            $table->string('street1', '200');
            $table->string('street2', 200)->nullable();
            $table->string('city', 100);
            $table->string('state', 50);
            $table->string('zip', '30');
            $table->boolean('kid_friendly');
            $table->boolean('pet_friendly');
            $table->smallInteger('max_stay_days');
            $table->smallInteger('beds');
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
        Schema::dropIfExists('listings');
    }
}
