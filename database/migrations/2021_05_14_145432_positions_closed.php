<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PositionsClosed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('positions_closed', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('user_id');
          $table->bigInteger('exchange_id');
          $table->string('OpenDate', 191)->nullable();
          $table->bigInteger('OpenDateTimestamp')->nullable();
          $table->string('CloseDate', 191)->nullable();
          $table->bigInteger('CloseDateTimestamp')->nullable();
          $table->string('ProviderName', 191)->nullable();
          $table->string('status', 191)->nullable();
          $table->string('SignalID', 191)->nullable();
          $table->string('Pair', 191)->nullable();
          $table->string('EntryPrice',191)->nullable();
          $table->string('ExitPrice', 191)->nullable();
          $table->string('Profit', 191)->nullable();
          $table->string('ProfitPercent', 191)->nullable();
          $table->string('Side', 191)->nullable();
          $table->string('StopLossPrice', 191)->nullable();
          $table->string('Amount', 191)->nullable();
          $table->string('Invested', 191)->nullable();
          $table->string('RealInvested', 191)->nullable();
          $table->string('UserAllocatedBalance', 191)->nullable();
          $table->string('AllocatedPercent', 191)->nullable();
          $table->string('Leverage', 191)->nullable();
          $table->string('TSL', 191)->nullable();
          $table->string('TP', 191)->nullable();
          $table->string('DCA', 191)->nullable();
          $table->string('Fees', 191)->nullable();
          $table->string('FundingFees', 191)->nullable();
          $table->string('NetProfitPercent', 191)->nullable();
          $table->string('NetProfit', 191)->nullable();
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
