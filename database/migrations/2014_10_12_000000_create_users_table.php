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
        Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('name')->nullable();
			$table->string('username');
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->string('gender')->nullable();
			$table->date('birthday')->nullable();
			$table->string('address')->nullable();
			$table->string('phone_number')->nullable();
			$table->text('role_id')->nullable();
			$table->string('department_id')->nullable();
			$table->string('position_id')->nullable();
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
};
