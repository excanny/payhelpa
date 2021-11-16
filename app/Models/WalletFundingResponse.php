<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletFundingResponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'account_number',
        'amount',
        'settlement_id'
    ];
}
