<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('description',700)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('manufacturer_country',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('price')->nullable();
            $table->integer('count')->nullable();
            $table->string('location',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('website',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('is_payed')->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->integer('counter')->nullable();
            $table->integer('img_id')->nullable();
            $table->integer('organizational_law_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('type')->nullable();
            $table->dateTime('create_date')->nullable();
            $table->dateTime('confirmation_date')->nullable();
            $table->dateTime('renew_date')->nullable();
            $table->dateTime('end_date')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `sell_orders` comment 'Продам'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_orders');
    }
}
