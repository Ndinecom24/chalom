<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
//            $table->string('mobile_number','13');
            $table->string('title');
            $table->string('name');
            $table->string('mobile_number','13');
            $table->string('dob')->nullable();
            $table->string('email')->unique();
            $table->string('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar', '450')->nullable();
            $table->string('identity', '450')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('plot_street')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('work_status_id')->nullable();
            $table->integer('role_id');
            $table->integer('customer_type_id');
            $table->integer('next_of_kin_id')->nullable();
            $table->integer('status_id');
            $table->integer('password_change');
            $table->uuid('uuid');
            $table->integer('created_by')->nullable();
            $table->integer('work_place_id')->nullable() ;
            $table->integer('payment_plan')->nullable() ;
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
