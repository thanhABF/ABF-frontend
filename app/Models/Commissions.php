<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
    use HasFactory;

    protected $table = 'commissions';

    protected $primaryKey = 'id';

    protected $fillable = [
      'user_id',
      'date',
      'btc_profit',
      'btc_rate',
      'btc_commission',
      'btc_commission_usd',
      'usdt_profit',
      'usdt_rate',
      'usdt_commission',
      'usdt_commission_usd',
      'eth_profit',
      'eth_rate',
      'eth_commission',
      'eth_commission_usd',
      'bnb_profit',
      'bnb_rate',
      'bnb_commission',
      'bnb_commission_usd',
      'total_commission_usd',
      'commission_rate',
      'status'
    ];

    public $timestamps = false;
}
