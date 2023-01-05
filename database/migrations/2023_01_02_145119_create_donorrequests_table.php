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
        Schema::create('donorrequests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('lastname');
            $table->string('photo');
            $table->string('phone');
            $table->string('gender');
            $table->string('bloodtype');
            $table->string('weight');
            $table->string('healthstatus');
            $table->string('bithdate');
            $table->string('state');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('status')->default("in progress");
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
        Schema::dropIfExists('donorrequests');
    }
};
