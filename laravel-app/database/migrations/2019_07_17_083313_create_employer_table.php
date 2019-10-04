<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_vi');
            $table->string('address_vi')->nullable();
            $table->text('about_vi')->nullable();
            $table->string('slug_vi');
            $table->string('title_tag_vi')->nullable();
            $table->text('keyword_tag_vi')->nullable();
            $table->text('description_tag_vi')->nullable();

            $table->string('name_en')->nullable();
            $table->string('address_en')->nullable();
            $table->text('about_en')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('title_tag_en')->nullable();
            $table->text('keyword_tag_en')->nullable();
            $table->text('description_tag_en')->nullable();

            $table->string('phone')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->integer('viewed')->default(10);
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
        Schema::dropIfExists('employer');
    }
}
