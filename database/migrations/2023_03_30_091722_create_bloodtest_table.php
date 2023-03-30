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
        Schema::create('bloodtest', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tech_id');
            $table->foreign('tech_id')->references('staff_id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('donor_id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('infectious_disease');
            $table->string('blood_pressure');
            $table->string('pulse_rate');
            $table->string('homoglobin_level');
            $table->string('cholesterol_level');
            $table->string('blood_glucose_level');
            $table->string('alt_level');
            $table->string('ast_level');
            $table->string('iron_level');
            $table->string('hct');
            $table->timestamps();
        });
    }

    /**
     * Sure! The normal range of values for hemoglobin level is 13.5 to 17.5 grams per deciliter (g/dL) for men 
     * and 12.0 to 15.5 g/dL for women. The normal range of values for cholesterol level is less than 200 milligrams per deciliter (mg/dL). 
     * The normal range of values for blood glucose level is between 70 and 99 milligrams per deciliter (mg/dL).
     * Reverse the migrations.
     * Sure! The normal range of values for iron level is 60 to 170 micrograms per deciliter (mcg/dL) for men 
     * and 40 to 150 mcg/dL for women. The normal range of values for hematocrit (Hct) is 38.8% to 50% for men and 34.9% to 44.5% for women. 
     * The normal range of values for ALT level is 7 to 55 units per liter (U/L) and for AST level is 8 to 48 U/L. 
     * The normal range of values for blood pressure is less than 120/80 mm Hg. 
     * The normal range of values for pulse rate is between 60 and 100 beats per minute (bpm).
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloodtest');
    }
};
