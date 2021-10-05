<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgTenOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_ten_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('home_image')->nullable();
            $table->integer('ten_orders_id')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `img_ten_orders` comment 'Заявки на изготовление ТЭНов Image'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_ten_orders');
    }
}
