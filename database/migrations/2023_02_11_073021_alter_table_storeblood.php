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
        Schema::table('storeblood', function (Blueprint $table) {
            $table->string('fullname')->after('user_id');
            $table->string('email')->after('fullname');
            $table->string('phone')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storeblood', function (Blueprint $table) {
            $table->dropColumn('fullname');
            $table->dropColumn('email');
            $table->dropColumn('phone');
        });
    }
};
