<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToJobAnnouncements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_announcements', function (Blueprint $table) {
            $table->string('job_add_image')->nullable()->after('job_postal_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_announcements', function (Blueprint $table) {
            $table->dropColumn('job_add_image');
        });
    }
}
