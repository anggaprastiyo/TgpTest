<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pod_id')->unsigned();
            $table->bigInteger('booking_status_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->integer('price');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->timestamps();

            $table->foreign('pod_id')->references('id')->on('pods');
            $table->foreign('booking_status_id')->references('id')->on('booking_statuses');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
