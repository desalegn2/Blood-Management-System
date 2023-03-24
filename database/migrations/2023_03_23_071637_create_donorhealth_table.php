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
        Schema::create('donorhealth', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tech_id');
            $table->foreign('tech_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('enrolldonor')->onDelete('cascade')->onUpdate('cascade');

            $table->string('blood_pressure');
            $table->string('pulse_rate');
            $table->string('homoglobin_level');
            $table->string('blood_temprature');
            $table->string('cholesterol_level');
            $table->string('blood_glucose_level');
            $table->string('iron_level');
            $table->string('blood_viscosity');
            $table->string('hct');
            $table->string('Weight');
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
        Schema::dropIfExists('donorhealth');
    }
};