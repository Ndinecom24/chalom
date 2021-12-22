<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('loan_purpose');
            $table->integer('loan_product_id');
            $table->double('loan_amount');
            $table->double('loan_rate');
            $table->double('loan_amount_due');
            $table->double('loan_arrangement_fee');
            $table->double('repayment_period');
            $table->double('monthly_income');
            $table->double('other_income');
            $table->double('monthly_deduct');
            $table->integer('statuses_id');
            $table->dateTime('date_submitted')->nullable();

            $table->integer('customer_id')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('loan_applications');
    }
}
