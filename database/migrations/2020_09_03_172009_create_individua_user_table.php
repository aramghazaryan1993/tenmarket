<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividuaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individua_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('first_name',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('middle_name',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('city',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('email',30)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->string('phone_number',30)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->integer('post_code')->nullable();
            $table->integer('user_id')->nullable();
           // $table->timestamps();
        });
        DB::statement("ALTER TABLE `individua_user` comment 'Физическое лицо ֆիզիկական անձ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individua_user');
    }
}
