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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name',20)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('gender')->nullable();
            $table->string('email')->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('region_id',30)->nullable();
            $table->string('country',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('is_viewed')->nullable();
            $table->string('img',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('phone_number',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('viber',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('whatsapp',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('block_user_type')->nullable();
            $table->integer('block_user_date')->nullable();
            $table->integer('block_user_id')->nullable();
            $table->integer('user_type')->nullable();
            $table->dateTime('create_date')->nullable();
            $table->rememberToken();

            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `users` comment 'Пользователь'");
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
