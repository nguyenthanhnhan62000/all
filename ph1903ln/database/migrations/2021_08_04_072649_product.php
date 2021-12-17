<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name',200);
            $table->string('slug',150)->unique();
            $table->string('image',150);
            $table->string('image_list');
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('category_id')->unsigned();
            $table->text('content');
            $table->tinyInteger('status')->nullable()->default(1);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('category_id')->references('id') ->on('category');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
