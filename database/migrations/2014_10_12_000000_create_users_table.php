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
            $table->string('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('is_business');
            $table->tinyInteger('number_verified')->default(0);
            $table->tinyInteger('id_verified')->default(0);
            $table->string('profile_pic')->nullable();
            $table->string('id_card')->nullable();
            $table->string('state')->nullable();
            $table->text('address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->tinyInteger('show_personal_info')->default(0)->nullable();
            $table->tinyInteger('show_account_balance')->default(0)->nullable();
            $table->tinyInteger('show_notification')->default(0)->nullable();
            $table->decimal('daily_transaction_limit', $precision = 8, $scale = 2);
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
