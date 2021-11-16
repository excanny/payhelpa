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

class DashboardController extends Controller
{
    public function dashboard()
    {
       $user = User::where('user_id', auth()->user()->user_id)->first();
        return view('dashboard.index', compact('user'));
       // return view('layouts.mastertesting', compact('user'));
    }

    public function test()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        //return view('dashboard.index', compact('user'));
        return view('layouts.test', compact('user'));
    }

    public function closed(Request $request)
    {
        return response()->json([ 
            'status' => true,
            'message' => 'Ok',
        ]);
    }

    public function p2pforeigntwo()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        $fu_rate = Transaction::where('is_taken', 0)->where('fu_id', auth()->user()->user_id)->first();

        if(is_null($fu_rate))
        {
            return view('dashboard.p2pforeigntwo', compact('user', 'fu_rate'));
        }
        else
        {
            $transaction_offers_lu = Transaction::where('is_taken', 0)->where('fu_id', null)->where('is_payment_confirmed', 1)->get();
            return view('dashboard.p2pforeignthree', compact('user', 'transaction_offers_lu', 'fu_rate'));
        }
        
    }

    public function p2pforeignthree()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
       // $lu_offers = LUOffer::get();
       $transaction_offers_lu = Transaction::where('is_taken', 0)->where('fu_id', null)->where('is_payment_confirmed', 1)->get();
       $fu_rate = Transaction::where('is_taken', 0)->where('fu_id', auth()->user()->user_id)->first();
       if(is_null($fu_rate))
       {
            return view('dashboard.p2pforeigntwo', compact('user', 'transaction_offers_lu', 'fu_rate'));
       }
       else
       {
             return view('dashboard.p2pforeignthree', compact('user', 'transaction_offers_lu', 'fu_rate'));
       }
        
    }


    public function wallet()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        return view('dashboard.wallet', compact('user'));
    }

    public function withdraw()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        return view('dashboard.withdraw', compact('user'));
    }

    public function profile()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        if($user->number_verified == 0)
        {
            return redirect('/dashboard/kyc/1')->with('error', 'Verify your number first');
        }
        else
        {
            return view('dashboard.profile', compact('user'));
        }
        
    }

    public function security()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        if($user->number_verified == 0)
        {
            return redirect('/dashboard/kyc/1')->with('error', 'Verify your number first');
        }
        else
        {
            return view('dashboard.security', compact('user'));
        }
        
    }

    public function kyc()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        if($user->number_verified == 0)
        {
            return redirect('/dashboard/kyc/1')->with('error', 'Verify your number first');
        }
        else
        {
            return view('dashboard.kyc', compact('user'));
        }
        
    }

    public function kycone()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        if($user->number_verified == 1)
        {
            return view('dashboard.kyc', compact('user'));
        }
        
        return view('dashboard.kycone', compact('user'));
    }

    public function kyctwo($slug)
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        if($slug == "local")
        {
            return view('dashboard.kyctwolocal', compact('user'));
        }
        else if($slug == "foreign")
        {
            return view('dashboard.kyctwoforeign', compact('user'));
        }
        
    }

    public function kycthree()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        return view('dashboard.kycthree', compact('user'));
    }

    public function status()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->orderBy('id', 'desc')->get();
        return view('dashboard.status', compact('user', 'transactions'));
    }

    public function statuscompleted()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->where('status', 2)->orderBy('id', 'desc')->get();
        return view('dashboard.status_completed', compact('user', 'transactions'));
    }

    public function statuspending()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->where('status', 0)->orderBy('id', 'desc')->get();
        return view('dashboard.status_pending', compact('user', 'transactions'));
    }

    public function statusongoing()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('dashboard.status_ongoing', compact('user', 'transactions'));
    }

    public function showaccountbalance(Request $request)
    {

         $data = [
            'show_account_balance' => $request->value,
           
        ];

        //return $data;

        $updated = User::where('user_id', auth()->user()->user_id)->update($data);

        return response()->json($updated);
    }

    public function loadaccountbalance()
    {
       
        $output = "";
        
        $user = User::where('user_id', auth()->user()->user_id)->first();

         if(empty($user))
         {
             $output = '<option value="">None found</option>';
         }
         else
         {
            
            if($user->show_account_balance == 1)
            {
                $checked = "checked";
            }
            else
            {
                $checked = "";
            }

            $output .= '
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="switchshowaccountbalance" '.$checked.'>
                <label class="custom-control-label cursor" for="switchshowaccountbalance">Show dashboard account balance</label>
                </div>
            ';

        
         }
        
         
         $data = array(
            'loadaccountbalance' => $output,
        
         );	

        return response()->json($data);
    }

    public function shownotifications(Request $request)
    {

         $data = [
            'show_notification' => $request->value,
           
        ];

        //return $data;

        $updated = User::where('user_id', auth()->user()->user_id)->update($data);

        return response()->json($updated);
    }

    public function loadshownotifications()
    {
       
        $output = "";
        
        $user = User::where('user_id', auth()->user()->user_id)->first();

         if(empty($user))
         {
             $output = '<option value="">None found</option>';
         }
         else
         {
            
            if($user->show_notification == 1)
            {
                $checked = "checked";
            }
            else
            {
                $checked = "";
            }

            $output .= '
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="switchloadnotifications" '.$checked.'>
                <label class="custom-control-label cursor" for="switchloadnotifications">Turn  on the notifications</label>
                </div>
            ';

        
         }
        
         
         $data = array(
            'loadshownotifications' => $output,
        
         );	

        return response()->json($data);
    }

    
    public function changebank(Request $request)
    {

        $data = [
            'bank_name' => $request->bank,
            'bank_account_name' => $request->acc_name,
            'bank_account_number' => $request->acc_no,
        ];

        //return $data;

        $updated = User::where('user_id', auth()->user()->user_id)->update($data);

        if($updated > 0)
        {
            return back()->with('success', 'Bank updated successfully');
        }
        else
        {
            return back()->with('error', 'Error occurred! Try again');
        }
    }

    public function phoneverified()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        return view('dashboard.phoneverified', compact('user'));
    }

    public function kycsubmitted()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        return view('dashboard.kycsubmitted', compact('user'));
    }

    public function kycverified()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        return view('dashboard.kycverified', compact('user'));
    }

    public function updatekyc()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        return view('dashboard.updatekyc', compact('user'));
    }
    
    public function transactiondetails($id)
    {
        $data = [
            'confirmed_transaction_seen' => 1
        ];

        $updated = Transaction::where('transaction_id', $id)->update($data);

        $user = User::where('user_id', auth()->user()->user_id)->first();
        $transaction = Transaction::where('transaction_id', $id)->first();
        
        return view('dashboard.transactions_details', compact('user', 'transaction'));
    }

}
