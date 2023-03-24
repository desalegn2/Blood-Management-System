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
            $table->foreign('tech_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('enrolldonor')->onDelete('cascade')->onUpdate('cascade');
            $table->string('packno');
            $table->string('bloodgroup');
            $table->string('volume');
            $table->string('rh');
            $table->string('status')->default("notexpired");
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