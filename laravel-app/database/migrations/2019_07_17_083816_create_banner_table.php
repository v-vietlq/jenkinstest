<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image_vi');
            $table->text('description_vi')->nullable();
            $table->string('link_vi')->nullable();

            $table->string('image_en');
            $table->string('description_en');
            $table->string('link_en')->nullable();

            $table->string('status')->default('on');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('position');
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
