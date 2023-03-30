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
        Schema::create('donation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('nurse_id')->references('staff_id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('donor_id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('packno');
            $table->string('volume');
            $table->string('weight');
            $table->string('status')->default("in progress");
            $table->string('remark');
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
        Schema::dropIfExists('donation');
    }
};
