<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDomicileToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable()->after('city_id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('taluka_id')->nullable()->after('district_id');
            $table->foreign('taluka_id')->references('id')->on('talukas');
            $table->unsignedBigInteger('union_council_id')->nullable()->after('taluka_id');
            $table->foreign('union_council_id')->references('id')->on('union_councils');
            $table->string('domicile_number')->nullable()->after('union_council_id');
            $table->string('current_address')->nullable()->after('total_experience');
            $table->string('permanent_address')->nullable()->after('postal_address');
            $table->string('domicile')->nullable()->after('domicile_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('district_id');
            $table->dropConstrainedForeignId('taluka_id');
            $table->dropConstrainedForeignId('union_council_id');
            $table->dropColumn('domicile_number');
            $table->dropColumn('postal_address');
            $table->dropColumn('permanent_address');
            $table->dropColumn('domicile');
        });
    }
}
