<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
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
            $table->string('product_key')->unique();
            $table->string('name');
            $table->text('desc');
            $table->integer('category_id');
            $table->tinyInteger('gender');//##1 Means Men ##2 Means Women 
            $table->string('image');
            $table->integer('review_id')->nullabale();
            $table->integer('stock');
            $table->string('color');
            $table->double('price');
            $table->integer('user_id');
            $table->tinyInteger('status')->default(1);
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
        //
    }
}
