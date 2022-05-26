<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCandidateDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_documents', function (Blueprint $table) {
            $table->string('grade')->nullable()->change();
            $table->decimal('obtain_marks')->nullable()->change();
            $table->string('grade_type')->nullable()->after('status');
            $table->string('year_of_admission')->nullable()->after('grade_type');
            $table->string('percentage')->nullable()->after('year_of_admission');
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
            $table->dropColumn('grade_type');
            $table->dropColumn('year_of_admission');
            $table->dropColumn('percentage');
        });
    }
}
