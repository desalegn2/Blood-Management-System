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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('age');
            $table->string('occupation');
            $table->string('photo');
            $table->string('weight');
            $table->string('height');

            $table->string('phone');
            $table->string('email');

            $table->string('bloodtype');
            $table->string('packno');
            $table->string('volume');
            $table->string('status')->default("in progress");
            $table->string('remark');

            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zone');
            $table->string('woreda');
            $table->string('kebelie');
            $table->string('housenumber');
            $table->string('typeofdonation');

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
