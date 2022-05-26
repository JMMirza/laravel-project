<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDropInstituteIdToCandidateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_documents', function (Blueprint $table) {
            // $table->dropForeign('institute_id');
            $table->dropForeign('candidate_documents_institute_id_foreign');
            $table->dropColumn('institute_id');
            $table->string('institute_name')->after('academic_achievement');
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
            $table->dropForeign('candidate_documents_institute_id_foreign');

            $table->dropColumn('institute_id');
            $table->dropColumn('institute_name');
        });
    }
}
