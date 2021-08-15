<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $table = 'balance';

    protected $primaryKey = 'id';

    protected $fillable = [
      'user_id',
      'balance'
    ];

    public $timestamps = false;
}
