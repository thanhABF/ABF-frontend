<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('date', 191)->nullable();
            $table->string('coinbase_id', 191)->nullable();
            $table->string('hosted_url', 191)->nullable();
            $table->string('local_currency', 191)->nullable();
            $table->string('local_amount', 191)->nullable();
            $table->string('btc', 191)->nullable();
            $table->string('bch', 191)->nullable();
            $table->string('eth', 191)->nullable();
            $table->string('usdc', 191)->nullable();
            $table->string('ltc', 191)->nullable();
            $table->string('dai', 191)->nullable();
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
