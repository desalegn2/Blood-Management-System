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
        Schema::create('bloodstock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tech_id');
            $table->foreign('tech_id')->references('staff_id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('donor_id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('bloodtest')->onDelete('cascade')->onUpdate('cascade');
            $table->string('packno');
            $table->string('bloodgroup');
            $table->string('volume');
            $table->string('rh');
            $table->string('status');
            $table->string('expitariondate');
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
        Schema::dropIfExists('bloodstock');
    }
};
