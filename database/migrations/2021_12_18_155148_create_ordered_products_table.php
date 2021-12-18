<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->defaut(null);
            $table->string('name')->defaut(null);
            $table->string('size')->defaut(null);
            $table->integer('quantity')->defaut(null);
            $table->string('other_addons')->defaut(null);
            $table->string('price')->defaut(null);
            $table->integer('product_id')->defaut(null);
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
        Schema::dropIfExists('ordered_products');
    }
}
