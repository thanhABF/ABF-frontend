<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchanges extends Model
{
    use HasFactory;

    protected $table = 'exchanges';

    protected $primaryKey = 'id';

    protected $fillable = [
      'user_id',
      'name',
      'exchange_based',
      'api_key',
      'api_secret',
      'status',
      'dca'
    ];

    public $timestamps = true;
}
