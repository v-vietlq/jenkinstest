<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_vi');
            $table->mediumText('description_vi')->nullable();
            $table->string('slug_vi');
            $table->string('value_vi');

            $table->string('name_en')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('value_en');

            $table->string('status')->default('on');
            $table->string('position')->default(1);
            $table->integer('parent')->default(0);
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
        Schema::dropIfExists('category');
    }
}
