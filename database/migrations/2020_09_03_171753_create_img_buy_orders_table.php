<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgBuyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_buy_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('home_image')->nullable();
            $table->integer('buy_orders_id')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `img_buy_orders` comment 'Куплю Image'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_buy_orders');
    }
}
