<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OTP;
use App\Models\OTPPhone;
use App\Models\Transaction;
use App\Models\Rating;
use App\Models\P2PState;
use App\Models\WalletFundingRequest;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;
use DateTime;

class P2PController extends Controller
{
  
    public function p2p()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        $transaction_offers_fu = Transaction::where('is_taken', 0)->where('lu_id', null)->get();
        $transaction_offers_lu = Transaction::where('is_taken', 0)->where('fu_id', null)->where('is_payment_confirmed', 1)->get();

        $lu_rate = Transaction::where('is_payment_confirmed', 0)->where('lu_id', auth()->user()->user_id)->first();
        $lu_rate2 = Transaction::where('is_payment_confirmed', 1)->where('confirmed_transaction_seen', 0)->where('lu_id', auth()->user()->user_id)->first();
        

        $fu_rate = Transaction::where('is_taken', 0)->where('fu_id', auth()->user()->user_id)->first();

        if(!is_null($lu_rate))
        {
            // This is to grab the stored
            $transaction_state = WalletFundingRequest::where('transaction_id', $lu_rate->transaction_id)->first();
        }
        else
        {
            $transaction_state = null;
        }

        //return $transaction_state;

        $date = new DateTime;
        $date->modify('-10 minutes');

        $formatted_date = $date->format('Y-m-d H:i:s');
      

        if($user->number_verified == 0)
        {
            return redirect('/dashboard/kyc/1')->with('error', 'Verify your number first');
        }
        else
        {
            if($user->kyc_verified == 0)
            {
                return redirect('/dashboard/kyc/1')->with('error', 'Submit your KYC docs first to be able to trade');
            }
            else
            {
           
                if($user->is_foreign_user == '0')
                {
                  
                    return view('dashboard.p2plocal', compact('user', 'transaction_offers_fu', 'lu_rate', 'lu_rate2', 'transaction_state'));
                
                }
                elseif($user->is_foreign_user == '1')
                {
                    if(is_null($fu_rate))
                    {
                        return view('dashboard.p2pforeignone', compact('user', 'transaction_offers_lu', 'fu_rate'));
                    }

                    return view('dashboard.p2pforeignthree', compact('user', 'transaction_offers_lu', 'fu_rate'));
                }
            }
        }
        
    }


}
