<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookCoinbase extends Model
{
    use HasFactory;

    protected $table = 'webhook_coinbase';

    protected $primaryKey = 'id';

    protected $fillable = [
      'response'
    ];

    public $timestamps = false;
}
