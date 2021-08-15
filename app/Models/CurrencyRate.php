<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    use HasFactory;

    protected $table = 'currency_rate';

    protected $primaryKey = 'id';

    protected $fillable = [
      'OpenDateTimestamp',
      'OpenDate',
      'CloseDateTimestamp',
      'CloseDate',
      'btc_open',
      'btc_high',
      'btc_low',
      'btc_close',
      'usdt_open',
      'usdt_high',
      'usdt_low',
      'usdt_close',
      'eth_open',
      'eth_high',
      'eth_low',
      'eth_close',
      'bnb_open',
      'bnb_high',
      'bnb_low',
      'bnb_close'
    ];

    public $timestamps = false;
}
