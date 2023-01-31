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
            $table->string('rh')->after('packno');
            $table->string('hct')->after('rh');
            $table->string('bloodpressure')->after('hct');
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
            $table->dropColumn('rh');
            $table->dropColumn('hct');
            $table->dropColumn('bloodpressure');
        });
    }
};
