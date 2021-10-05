<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixedDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mixed_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('email',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('text_contact')->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('text_advertising')->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('youtube_link',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('privacy_policy')->charset('utf8')->collate('utf8_bin')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `mixed_data` comment 'խառը տվյալներ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mixed_data');
    }
}
