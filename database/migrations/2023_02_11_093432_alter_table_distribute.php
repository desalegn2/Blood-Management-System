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
        Schema::table('distribute', function (Blueprint $table) {
            $table->string('recievedby')->after('volume');
            $table->string('packno')->after('recievedby');
            $table->string('rh')->after('packno');
            $table->string('hct')->after('rh');
            $table->string('bloodpressure')->after('hct');
            $table->string('donateby')->after('bloodpressure');
            $table->string('donoremail')->after('donateby');
            $table->string('donorphone')->after('donoremail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distribute', function (Blueprint $table) {
            $table->dropColumn('recievedby');
            $table->dropColumn('packno');
            $table->dropColumn('donateby');
            $table->dropColumn('donoremail');
            $table->dropColumn('donorphone');
            $table->dropColumn('rh');
            $table->dropColumn('hct');
            $table->dropColumn('bloodpressure');
        });
    }
};
