<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->string('action');
            $table->integer('from_status_id');
            $table->integer('to_status_id');
            $table->integer('loan_applications_id');
            $table->integer('users_id');
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('loan_approvals');
    }
}
