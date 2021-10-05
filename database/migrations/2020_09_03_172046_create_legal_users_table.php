<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('INN',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('company_name',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('company_full_name',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('KPP',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('OGRN',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('phone_number',50)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->string('email',30)->charset('utf8')->collate('utf8_bin')->nullable()->unique();
            $table->string('contact_person',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('legal_address',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('delivery_type')->nullable();
            $table->integer('post_index')->nullable();
            $table->string('customer_box',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('post_address',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('locality',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('street',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('to_post_index')->nullable();
            $table->string('house',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('to_post_address',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('BIK',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('check_account',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('KBK',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('OKTMO',50)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->integer('user_id')->nullable();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE `legal_users` comment 'Юридическое лицо իրավաբանական'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_users');
    }
}
