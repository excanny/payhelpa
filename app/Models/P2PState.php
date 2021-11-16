<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P2PState extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rate',
        'amount',
        'dynamic_account_number',
    ];
}
