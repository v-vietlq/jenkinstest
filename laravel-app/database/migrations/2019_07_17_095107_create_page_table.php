<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_vi');
            $table->text('intro_vi')->nullable();
            $table->text('content_vi')->nullable();
            $table->string('slug_vi')->nullable();
            $table->string('title_tag_vi')->nullable();
            $table->string('description_tag_vi')->nullable();

            $table->string('title_en')->nullable();
            $table->text('intro_en')->nullable();
            $table->text('content_en')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('title_tag_en')->nullable();
            $table->string('description_tag_en')->nullable();

            $table->string('image')->nullable();
            $table->string('status')->default('on');
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
        Schema::dropIfExists('page');
    }
}
