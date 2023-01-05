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
        Schema::create('hospitalrequest', function (Blueprint $table) {
            $table->id();
            $table->string('hospitalname');
            $table->string('date');
            $table->string('phone');
            $table->string('email');
            $table->string('bloodgroup');
            $table->string('volume');
            $table->string('reason');

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
        Schema::dropIfExists('hospitalrequest');
    }
};
