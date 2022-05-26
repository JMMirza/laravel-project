<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToJobPrefrences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_documents', function (Blueprint $table) {
            $table->string('program_name')->nullable()->after('academic_achievement');
            $table->string('major_subject')->nullable()->after('program_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate_documents', function (Blueprint $table) {
            $table->dropColumn('program_name');
            $table->dropColumn('major_subject');
        });
    }
}
