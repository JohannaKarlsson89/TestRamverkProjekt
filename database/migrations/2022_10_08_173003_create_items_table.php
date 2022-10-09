<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('item-name');
            $table->string('item-price');
            $table->string('item-description');
            $table->bigInteger('category-id')->unsigned();
            $table->string('item-count');
            $table->binary('item-picture')->nullable();
            $table->foreign('category-id')->references('id')->on('categories');
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
