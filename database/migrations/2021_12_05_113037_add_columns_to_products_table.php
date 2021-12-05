<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image_url');
            $table->boolean('vegan')->default(false);
            $table->boolean('cheese')->default(false);
            $table->boolean('tomato')->default(false);
            $table->boolean('paprika')->default(false);
            $table->boolean('chicken')->default(false);
            $table->boolean('beaf')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
