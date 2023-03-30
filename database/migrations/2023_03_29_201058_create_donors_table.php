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
        Schema::create('donors', function (Blueprint $table) {
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('referral_code');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('age');
            $table->string('occupation');
            $table->string('weight');
            $table->string('height');
            $table->string('phone');
            $table->string('bloodtype');
            $table->string('typeofdonation');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zone');
            $table->string('woreda');
            $table->string('kebelie');
            $table->string('housenumber');
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
        Schema::dropIfExists('donors');
    }
};
