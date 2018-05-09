<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectPlatesAndOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            # Add a new INT field called `author_id` that has to be unsigned (i.e. positive)
            $table->integer('plate_id')->unsigned();

            # This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
            $table->foreign('plate_id')->references('id')->on('plates');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('orders_plate_id_foreign');

            $table->dropColumn('plate_id');
        });

    }
}
