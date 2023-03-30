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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referring_id');
            $table->foreign('referring_id')->references('donor_id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('referred_id');
            $table->foreign('referred_id')->references('donor_id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status')->default("crete account");
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
        Schema::dropIfExists('referrals');
    }
};

