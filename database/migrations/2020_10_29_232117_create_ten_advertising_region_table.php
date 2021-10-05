<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenAdvertisingRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ten_advertising_region', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('region_id')->nullable();
            $table->integer('ten_orders_id')->nullable();
            $table->integer('organizational_law_id')->nullable();
            $table->integer('type_position')->nullable();
            $table->dateTime('create_date')->nullable();
            $table->dateTime('confirmation_date')->nullable();
            $table->dateTime('renew_date')->nullable();
           // $table->timestamps();
        });
        DB::statement("ALTER TABLE `ten_advertising_region` comment 'Заявки на изготовление ТЭНов реклами'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ten_advertising_region');
    }
}
