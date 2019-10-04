<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_vi');
            $table->string('author_vi')->nullable();
            $table->text('intro_vi')->nullable();
            $table->text('content_vi')->nullable();
            $table->string('slug_vi');
            $table->string('title_tag_vi')->nullable();
            $table->text('keyword_tag_vi')->nullable();
            $table->text('description_tag_vi')->nullable();

            $table->string('title_en')->nullable();
            $table->string('author_en')->nullable();
            $table->text('intro_en')->nullable();
            $table->text('content_en')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('title_tag_en')->nullable();
            $table->text('keyword_tag_en')->nullable();
            $table->text('description_tag_en')->nullable();

            $table->string('images')->nullable();
            $table->string('status')->default('on');
            $table->string('featured')->default('off');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
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
        Schema::dropIfExists('news');
    }
}
