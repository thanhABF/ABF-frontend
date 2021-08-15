<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionsOpen extends Model
{
    use HasFactory;

    protected $table = 'positions_open';

    protected $primaryKey = 'id';

    protected $fillable = [
      'user_id',
      'exchange_id',
      'OpenDate',
      'OpenDateTimestamp',
      'CloseDate',
      'CloseDateTimestamp',
      'ProviderName',
      'status',
      'SignalID',
      'Pair',
      'EntryPrice',
      'ExitPrice',
      'Profit',
      'ProfitPercent',
      'Side',
      'StopLossPrice',
      'Amount',
      'Invested',
      'RealInvested',
      'UserAllocatedBalance',
      'AllocatedPercent',
      'Leverage',
      'TSL',
      'TP',
      'DCA',
      'Fees',
      'FundingFees',
      'NetProfitPercent',
      'NetProfit'
    ];

    public $timestamps = false;
}
