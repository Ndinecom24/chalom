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
            $table->string('name');
            $table->string('mobile_number')->nullable();
            $table->string('dob')->nullable();
            $table->string('email')->unique();
            $table->string('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('plot_street')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('work_status')->nullable();
            $table->integer('role_id');
            $table->integer('customer_type_id');
            $table->integer('status_id');
            $table->integer('password_change');
            $table->integer('created_by')->nullable();
            $table->integer('deleted_at')->nullable();
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
