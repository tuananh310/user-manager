<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('position_id')->nullable();
            $table->string('department_id')->nullable();
            $table->date('received_time')->nullable();
            $table->integer('source_id')->nullable();
            $table->integer('receiver_id')->nullable();
            $table->string('relationship_note')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->date('birthday')->nullable();
            $table->text('score')->nullable();
            $table->integer('household')->nullable();
            $table->integer('address')->nullable();
            $table->string('address_detail')->nullable();
            $table->string('level')->nullable();
            $table->string('branch')->nullable();
            $table->string('major')->nullable();      //Chuyên ngành học - nhập tay
            $table->string('experience')->nullable(); //Nhập tay
            $table->string('rank')->nullable();
            $table->string('english')->nullable();
            $table->string('training_place')->nullable();
            $table->string('other_language')->nullable();
            $table->string('other_software')->nullable();
            $table->string('info1')->nullable();
            $table->string('info2')->nullable();

            $table->string('interview_comment')->nullable();
            $table->string('interview_result')->nullable();
            $table->string('interviewer')->nullable();
            $table->date('interview_date')->nullable();

            $table->string('interview_comment0')->nullable();
            $table->string('interview_result0')->nullable();
            $table->string('interviewer0')->nullable();
            $table->date('interview_date0')->nullable();

            $table->string('interview_comment1')->nullable();
            $table->string('interview_result1')->nullable();
            $table->string('interviewer1')->nullable();
            $table->date('interview_date1')->nullable();

            $table->string('interview_comment2')->nullable();
            $table->string('interview_result2')->nullable();
            $table->string('interviewer2')->nullable();
            $table->date('interview_date2')->nullable();

            $table->string('interview_comment3')->nullable();
            $table->string('interview_result3')->nullable();
            $table->string('interviewer3')->nullable();
            $table->date('interview_date3')->nullable();
            $table->string('level_value', 50)->nullable();
            $table->string('rank_value', 50)->nullable();
            $table->string('branch_value', 50)->nullable();
            $table->string('interview_result_value', 50)->nullable();
            $table->string('interview_result0_value', 50)->nullable();
            $table->string('interview_result1_value', 50)->nullable();
            $table->string('interview_result2_value', 50)->nullable();
            $table->string('interview_result3_value', 50)->nullable();
            $table->string('recruitment_result')->nullable();
            $table->string('user_uid')->nullable();
            $table->string('probation_result')->nullable();
            $table->string('now_result')->nullable();
            $table->string('status_value', 50)->nullable();
            // $table->index(['status'], 'candidate_status_index');
            $table->integer('approve_id')->nullable();
            $table->json('timeline')->nullable();
            $table->json('approve')->nullable();
            $table->string('gender_value', 50)->nullable();
            $table->boolean('active')->nullable();
            $table->string('status', 50)->nullable()->change();
            // $table->integer('status')->nullable();
            $table->integer('request_form_id')->nullable();
            $table->integer('stage')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate');
    }
};
