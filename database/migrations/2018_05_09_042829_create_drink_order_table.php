<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_order', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_id')->unsigned();
            $table->integer('drink_id')->unsigned();

            # Make foreign keys
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('drink_id')->references('id')->on('drinks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drink_order');
    }
}
