<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('literacy')->nullable();
            $table->integer('years_experience')->nullable();
            $table->integer('marital_status')->nullable();
            $table->string('zalo_phone')->nullable();
            $table->tinyInteger('driver_license')->default(1);
            $table->string('company_did')->nullable();
            $table->string('position_did')->nullable();
            $table->string('cv_file')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_info');
    }
}
