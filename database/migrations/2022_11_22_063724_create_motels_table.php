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
        Schema::create('motels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->nullable();
            $table->text('description')->nullable();
            $table->Integer('price')->nullable();
            $table->Integer('area')->nullable();
            $table->Integer('count_view')->nullable();
            $table->string('address',255)->nullable();
            $table->string('latlng',255)->nullable();
            $table->string('images');
            $table->Integer('user_id')->nullable();
            $table->Integer('category_id')->nullable();
            $table->Integer('district_id')->nullable();
            $table->string('utilities',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->Integer('approve')->nullable();
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
        Schema::dropIfExists('motels');
    }
};
