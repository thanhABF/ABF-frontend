<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('commissions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('user_id');
          $table->string('date', 191)->nullable();
          $table->string('btc_profit', 191)->nullable();
          $table->string('btc_rate', 191)->nullable();
          $table->string('btc_commission', 191)->nullable();
          $table->string('btc_commission_usd', 191)->nullable();

          $table->string('usdt_profit', 191)->nullable();
          $table->string('usdt_rate', 191)->nullable();
          $table->string('usdt_commission', 191)->nullable();
          $table->string('usdt_commission_usd', 191)->nullable();

          $table->string('eth_profit', 191)->nullable();
          $table->string('eth_rate', 191)->nullable();
          $table->string('eth_commission', 191)->nullable();
          $table->string('eth_commission_usd', 191)->nullable();

          $table->string('bnb_profit', 191)->nullable();
          $table->string('bnb_rate', 191)->nullable();
          $table->string('bnb_commission', 191)->nullable();
          $table->string('bnb_commission_usd', 191)->nullable();

          $table->string('total_commission_usd', 191)->nullable();
          $table->string('commission_rate', 191)->nullable();

          $table->string('status', 191)->nullable();
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
