<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_vi');
            $table->string('age_vi')->nullable();
            $table->string('address_vi')->nullable();
            $table->string('salary_vi')->nullable();
            $table->string('time_work_vi')->nullable();
            $table->string('place_work_vi')->nullable();
            $table->text('description_vi')->nullable();
            $table->string('slug_vi');
            $table->string('title_tag_vi')->nullable();
            $table->text('keyword_tag_vi')->nullable();
            $table->text('description_tag_vi')->nullable();
            $table->text('content_vi')->nullable();
            $table->text('welfare_vi')->nullable();
            $table->string('contact_info_vi')->nullable();

            $table->string('name_en')->nullable();
            $table->string('age_en')->nullable();
            $table->string('address_en')->nullable();
            $table->string('salary_en')->nullable();
            $table->string('time_work_en')->nullable();
            $table->string('place_work_en')->nullable();
            $table->text('description_en')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('title_tag_en')->nullable();
            $table->text('keyword_tag_en')->nullable();
            $table->text('description_tag_en')->nullable();
            $table->text('content_en')->nullable();
            $table->text('welfare_en')->nullable();
            $table->string('contact_info_en')->nullable();

            $table->integer('quantity')->default(1);
            $table->string('contract')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('gender')->nullable();
            $table->integer('literacy')->nullable();
            $table->integer('years_experience')->nullable();
            $table->integer('viewed')->default(0);
            $table->string('banner')->nullable();
            $table->string('sticker')->nullable();
            $table->string('status')->default('on');
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('ward')->nullable();
            $table->string('post_time_at');
            $table->string('delete_time_at');
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('employer');
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
        Schema::dropIfExists('job');
    }
}
