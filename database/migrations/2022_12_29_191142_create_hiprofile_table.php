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
        Schema::create('hiprofile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            /*@ Connect hospitalpost table's user_id with users table's id field */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Hospitalname');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('photo');
            $table->string('phone');
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
        Schema::dropIfExists('hiprofile');
    }
};
