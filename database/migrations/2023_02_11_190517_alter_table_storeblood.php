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
            $table->string('state')->after('phone');
            $table->string('city')->after('state');
            $table->string('kebelie')->after('city');
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
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('kebelie');
        });
    }
};
