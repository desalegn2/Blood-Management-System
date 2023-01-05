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
        Schema::create('hospitalpost', function (Blueprint $table) {
            $table->id();
            //$table->integer('user_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            /*@ Connect hospitalpost table's user_id with users table's id field */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('gender');
            $table->string('whenneed');
            $table->string('amount');
            $table->string('bloodtype');
            $table->string('age');
            $table->string('hospital');
            $table->string('state');
            $table->string('city');
            $table->string('purpose');
            $table->string('photo');
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
        Schema::dropIfExists('hospitalpost');
    }
};
