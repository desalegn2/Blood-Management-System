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
        Schema::create('transfusion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('doctor_id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('donor_id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('patientid_number');
            $table->string('patient_fname');
            $table->string('patient_lname');
            $table->string('gender');
            $table->string('phone');
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
        Schema::dropIfExists('transfusion');
    }
};
