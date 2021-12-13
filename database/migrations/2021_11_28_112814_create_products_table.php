<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->decimal('price')->nullable();
            $table->boolean('vegan')->default(false);
            $table->boolean('cheese')->default(false);
            $table->boolean('tomato')->default(false);
            $table->boolean('paprika')->default(false);
            $table->boolean('chicken')->default(false);
            $table->boolean('beaf')->default(false);
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
        Schema::dropIfExists('products');
    }
}
