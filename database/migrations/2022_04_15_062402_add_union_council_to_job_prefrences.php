<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnionCouncilToJobPrefrences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_prefrences', function (Blueprint $table) {
            $table->unsignedBigInteger('union_council_id')->nullable()->change();
            $table->dropForeign(['union_council_id']);
            $table->foreign('union_council_id')->references('id')->on('union_councils')->onDelete('set null');
            $table->string('union_council')->nullable()->after('taluka_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_prefrences', function (Blueprint $table) {
            $table->dropColumn('union_council');
            $table->unsignedBigInteger('union_council_id')->change();
        });
    }
}
