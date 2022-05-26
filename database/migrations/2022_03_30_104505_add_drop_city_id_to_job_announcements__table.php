<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDropCityIdToJobAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_announcements', function (Blueprint $table) {
            $table->dropForeign('job_announcements_city_id_foreign');
            $table->dropColumn('city_id');
            $table->string('city_names')->after('state_id');
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
            $table->dropForeign('job_announcements_city_id_foreign');

            $table->dropColumn('city_id');
            $table->dropColumn('city_names');
        });
    }
}
