<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('massages')->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('senders_name',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('product_type')->nullable();
            $table->integer('user_id')->nullable();
            $table->dateTime('create_date')->nullable();
            $table->dateTime('renew_date')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_messages');
    }
}
