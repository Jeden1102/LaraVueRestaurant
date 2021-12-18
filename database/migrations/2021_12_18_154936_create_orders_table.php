<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->integer('user_id')->nullable();
            $table->string('price');
            $table->string('delivery_price');
            $table->string('sumPrice');
            $table->string('street');
            $table->string('city');
            $table->string('number');
            $table->string('phone');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
