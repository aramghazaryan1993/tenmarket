<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyAdvertisingRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_advertising_region', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('region_id')->nullable();
            $table->integer('buy_orders_id')->nullable();
            $table->integer('organizational_law_id')->nullable();
            $table->integer('type_position')->nullable();
            $table->dateTime('create_date')->nullable();
            $table->dateTime('confirmation_date')->nullable();
            $table->dateTime('renew_date')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `buy_orders` comment 'Куплю реклами'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_advertising_region');
    }
}
