<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->text('content_vi')->nullable();

            $table->text('content_en')->nullable();

            $table->string('image')->nullable();
            $table->string('status')->default('on');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('page');
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
        Schema::dropIfExists('content');
    }
}
