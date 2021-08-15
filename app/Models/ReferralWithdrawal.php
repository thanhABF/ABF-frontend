<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralWithdrawal extends Model
{
    use HasFactory;

    protected $table = 'referral_withdrawal';

    protected $primaryKey = 'id';

    protected $fillable = [
      'user_id',
      'target',
      'amount',
      'currency',
      'wallet',
      'status'
    ];

    public $timestamps = true;
}
