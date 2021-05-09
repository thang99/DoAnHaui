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
            $table->increments('id');
            $table->string('name');
            $table->string('ram');
            $table->string('cpu');
            $table->string('hard_drive');
            $table->string('screen');
            $table->string('size');
            $table->integer('sale');
            $table->string('operator_system');
            $table->float('price');
            $table->string('image');
            $table->integer('status');
            $table->integer('quantity');
            $table->text('description');
            $table->string('origin');
            $table->integer('year_of_launch');
            $table->integer('manufacturer_id');
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
