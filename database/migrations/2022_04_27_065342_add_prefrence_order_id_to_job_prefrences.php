<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrefrenceOrderIdToJobPrefrences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_prefrences', function (Blueprint $table) {
            $table->string('pref_order')->nullable()->after('school_id');
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
            $table->dropColumn('pref_order');
        });
    }
}
