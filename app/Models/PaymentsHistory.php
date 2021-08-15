<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsHistory extends Model
{
    use HasFactory;

    protected $table = 'payments_history';

    protected $primaryKey = 'id';

    protected $fillable = [
      'user_id',
      'date',
      'coinbase_id',
      'hosted_url',
      'local_currency',
      'local_amount',
      'btc',
      'bch',
      'eth',
      'usdc',
      'ltc',
      'dai',
      'status'
    ];

    public $timestamps = false;
}
