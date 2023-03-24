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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('age');
            $table->string('occupation');
            $table->string('weight');
            $table->string('height');

            $table->string('phone');
            $table->string('email');

            $table->string('bloodtype');
            $table->string('reservationdate');
            $table->string('center');
            $table->string('health');

            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zone');
            $table->string('woreda');
            $table->string('kebelie');
            $table->string('housenumber');
            $table->string('appointmentdate')->default("in progress");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. referrals
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
};
$table->unsignedBigInteger('referring_id');
$table->foreign('referring_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
$table->unsignedBigInteger('referred_id');
$table->foreign('referred_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
$table->string('referral_code');
$table->string('status')->default("crete account");
