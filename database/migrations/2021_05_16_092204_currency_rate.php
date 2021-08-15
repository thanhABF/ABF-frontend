<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CurrencyRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_rate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('OpenDateTimestamp');
            $table->string('OpenDate', 191)->nullable();
            $table->bigInteger('CloseDateTimestamp');
            $table->string('CloseDate', 191)->nullable();
            $table->string('btc_open', 191)->nullable();
            $table->string('btc_high', 191)->nullable();
            $table->string('btc_low', 191)->nullable();
            $table->string('btc_close', 191)->nullable();

            $table->string('usdt_open', 191)->nullable();
            $table->string('usdt_high', 191)->nullable();
            $table->string('usdt_low', 191)->nullable();
            $table->string('usdt_close', 191)->nullable();

            $table->string('eth_open', 191)->nullable();
            $table->string('eth_high', 191)->nullable();
            $table->string('eth_low', 191)->nullable();
            $table->string('eth_close', 191)->nullable();

            $table->string('bnb_open', 191)->nullable();
            $table->string('bnb_high', 191)->nullable();
            $table->string('bnb_low', 191)->nullable();
            $table->string('bnb_close', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
