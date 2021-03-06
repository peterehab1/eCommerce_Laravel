<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('product_key');
            $table->integer('quantity');
            $table->integer('color_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->integer('user_id');
            ##Ordered Explain 
            // 0 Means Not Ordered Yet
            // 1 Means Order is Placed
            // 2 Means Ordered Arrived
            $table->tinyInteger('ordered')->default(0); // => 0 Means Not Ordered Yet
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
