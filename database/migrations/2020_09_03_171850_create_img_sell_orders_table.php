<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgSellOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_sell_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('home_image')->nullable();
            $table->integer('home_image')->nullable();
            $table->integer('sell_orders_id')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `img_sell_orders` comment 'Продам Image'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_sell_orders');
    }
}
