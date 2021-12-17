<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Banner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name',200);
            $table->string('link',150);
            $table->string('image',150)->unique();
            $table->tinyInteger('odering')->nullable()->default(1);
            $table->tinyInteger('status')->nullable()->default(1);
            $table->text('content');
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
        Schema::dropIfExists('banner');
    }
}
