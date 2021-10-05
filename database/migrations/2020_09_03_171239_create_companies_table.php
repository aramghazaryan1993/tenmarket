<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('description',500)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('address',30)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('map_location',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('email',20)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->string('img',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('website',100)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('working_hours_start',10)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('working_hours_end',10)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('phone_number',30)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->string('viber',30)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->string('whatsapp',30)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->integer('is_payed')->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->integer('organizational_law_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('type')->nullable();
            $table->dateTime('create_date')->nullable();
            $table->dateTime('confirmation_date')->nullable();
            $table->dateTime('renew_date')->nullable();
            $table->dateTime('end_date')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `companies` comment 'Организаций'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
