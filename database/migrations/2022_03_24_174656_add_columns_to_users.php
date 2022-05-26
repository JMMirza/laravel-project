<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->after('cnic_number')->nullable(); //add this column
            $table->string('maritial_status')->after('dob')->nullable(); //add this column
            $table->string('place_of_birth')->after('maritial_status')->nullable(); //add this column
            $table->string('postal_address')->after('place_of_birth')->nullable(); //add this column
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
            $table->dropColumn('dob');
            $table->dropColumn('maritial_status');
            $table->dropColumn('place_of_birth');
            $table->dropColumn('postal_address');
        });
    }
}
