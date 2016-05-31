<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('fname');
            $table->string('sname');
            $table->string('lname');
            $table->string('country');
            $table->integer('oc_country_id');
            $table->integer('address_index');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('check_id');
            $table->integer('price');
            $table->integer('status')->default(0);
            $table->integer('date');
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
        Schema::drop('orders');
    }
}
