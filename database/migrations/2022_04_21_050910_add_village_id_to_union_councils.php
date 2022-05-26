<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVillageIdToUnionCouncils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('union_councils', function (Blueprint $table) {
            $table->unsignedBigInteger('village_id')->nullable()->after('taluka_id');
            $table->foreign('village_id')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('union_councils', function (Blueprint $table) {
            $table->dropConstrainedForeignId('village_id');
            $table->dropColumn('village_id');
        });
    }
}
