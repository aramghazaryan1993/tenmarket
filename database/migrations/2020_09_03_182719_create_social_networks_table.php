<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_networks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('instagram',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('youtube',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('twitter',50)->charset('utf8')->collate('utf8_bin')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `social_networks` comment 'Սոցանցերի հղումներ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_networks');
    }
}
