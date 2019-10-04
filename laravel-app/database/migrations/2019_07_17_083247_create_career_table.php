<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_vi');
            $table->text('description_vi')->nullable();
            $table->string('slug_vi');
            $table->string('title_tag_vi')->nullable();
            $table->text('keyword_tag_vi')->nullable();
            $table->text('description_tag_vi')->nullable();

            $table->string('name_en');
            $table->text('description_en')->nullable();
            $table->string('slug_en');
            $table->string('title_tag_en')->nullable();
            $table->text('keyword_tag_en')->nullable();
            $table->text('description_tag_en')->nullable();

            $table->integer('viewed')->default(0);
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
        Schema::dropIfExists('career');
    }
}
