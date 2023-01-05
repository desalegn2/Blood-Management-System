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
        Schema::create('distributeblood', function (Blueprint $table) {
            $table->id();
            $table->string('bloodgroup');
            $table->string('volume');
            $table->string('issueddate');
            $table->string('expirydate');
            $table->string('recievedby');
            $table->string('issuedby');
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
        Schema::dropIfExists('distributeblood');
    }
};
