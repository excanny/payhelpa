<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletFundingRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id',
        'account_number',

    ];
}
