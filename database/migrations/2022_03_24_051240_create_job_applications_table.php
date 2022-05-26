<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_announcement_id');
            $table->foreign('job_announcement_id')->references('id')->on('job_announcements');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('is_shortlisted')->nullable();
            $table->date('shortlisted_at')->nullable();
            $table->unsignedBigInteger('shortlisted_by')->nullable();
            $table->foreign('shortlisted_by')->references('id')->on('users');
            $table->boolean('invitation_sent')->nullable();
            $table->unsignedBigInteger('invitation_sent_by')->nullable();
            $table->foreign('invitation_sent_by')->references('id')->on('users');
            $table->date('invitation_sent_at')->nullable();
            $table->boolean('sms_sent')->nullable();
            $table->string('sms_sent_by')->nullable();
            $table->date('sms_sent_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}
