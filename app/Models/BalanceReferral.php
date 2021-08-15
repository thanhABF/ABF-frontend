<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceReferral extends Model
{
    use HasFactory;

    protected $table = 'balance_referral';

    protected $primaryKey = 'id';

    protected $fillable = [
      'user_id',
      'balance'
    ];

    public $timestamps = false;
}
