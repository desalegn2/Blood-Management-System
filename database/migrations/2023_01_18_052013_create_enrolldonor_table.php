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
        Schema::create('enrolldonor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('lastname');
            $table->string('occupation');
            $table->string('photo');
            $table->string('phone');
            $table->string('gender');
            $table->string('bloodtype');
            $table->string('volume');
            $table->string('bloodpressure');
            $table->string('hct');
            $table->string('remark');
            $table->string('weight');
            $table->string('height');
            $table->string('rh');
            $table->string('bithdate');
            $table->string('state');
            $table->string('city');
            $table->string('zone');
            $table->string('woreda');
            $table->string('kebelie');
            $table->string('housenumber');
            $table->string('typeofdonation');
            $table->string('email');
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
        Schema::dropIfExists('enrolldonor');
    }
};
