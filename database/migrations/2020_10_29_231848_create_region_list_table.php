<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('region',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `region_list` comment 'Region list'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region_list');
    }
}
