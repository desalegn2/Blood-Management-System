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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('hospitalname');
            $table->string('manager_fname');
            $table->string('manager_lname');
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
        Schema::dropIfExists('hospitals');
    }
};
