<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUnionCouncilFromJobPrefrences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_prefrences', function (Blueprint $table) {
            $table->dropColumn('union_council');
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
            $table->string('union_council');
        });
    }
}
