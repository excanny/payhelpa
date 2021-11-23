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
use App\Notifications\PaymentConfirmed;
use App\Notifications\PhoneVerified;
use App\Notifications\AccountVerifying;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Transactionconfirmation;
use App\Notifications\PaymentConfirmedFU;
use App\Notifications\PaymentSuccessful;
use App\Notifications\PaymentSuccessfulFU;
use App\Notifications\RateAcceptanceFU;
use App\Notifications\RateAcceptanceLU;
use App\Notifications\TransactionCompletedFU;
use App\Notifications\TransactionCompletedLU;
use App\Notifications\WalletFundingLU;

class TransactionController extends Controller
{

    public function futradetransaction(Request $request)
    {
     
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return back()->with('error', 'Error occurred! Refresh page and try again');
        }

        $transaction = Transaction::where('transaction_id', $request->transaction_id)->first();

        if(!empty($transaction))
        {
            
            $data = [
                    
                    'fu_id' => auth()->user()->user_id,
                    'is_taken' => 1,
         
                ];

            $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

            if($updated > 0)
            {
                return redirect('/dashboard/transaction/'.$request->transaction_id.'/details')->with('success', 'Transaction accepted successfully');
            }
            else
            {
                return back()->with('error', 'Error occurred! Refresh page and try again');
            }

        }
        else
        {
            return back()->with('error', 'Error occurred! Refresh page and try again');
        }
    }

    public function updatefutransactionstatustoongoing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return back()->with('error', 'Error occurred! Refresh page and try again');
        }

        $data = [
            'status' => 1,
        ];

        $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

        if($updated > 0)
        {
            return back()->with('success', 'Transaction status updated successfully');
        }
        else
        {
            return back()->with('error', 'Error occurred! Refresh page and try again');
        }
    }


      public function updatefutransactionstatus2(Request $request)
    {
        //end of transaction and mail would be sent to both
        
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
        ]);
         $user = User::where('user_id', auth()->user()->user_id)->first();


        if ($validator->fails()) 
        {
            return back()->with('error', 'Error occurred! Refresh page and try again');
        }

        $data = [
            'status' => 2,
        ];

        $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

        if($updated > 0)
        {
            $user->notify(new TransactionCompletedLU());
            return back()->with('success', 'Transaction status has been updated successfully');
        }
        else
        {
            return back()->with('error', 'Error occurred! Refresh page and try again');
        }
    }


    public function uploadreceiptfu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'transaction_id' => 'required'
        ]);


        if($validator->fails())
        {
            return back()->with('error', $validator->messages());
        }
       
        if ($request->hasFile('receipt')) 
        {
            $file = $request->file('receipt');
            
            $receiptfileName = time().uniqid().'.'.$request->receipt->extension();
            
            $path = $file->storeAs('uploads/transaction_receipts', $receiptfileName, 's3');
        
            $data = [
                'transaction_receipt' => $receiptfileName
            ];

            $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

            if($updated > 0)
            {
                return response()->json(['submitted' => 1]);
            }
            else
            {
                return response()->json(['submitted' => 0]);
            }
        
        }
       
    }

    public function banktransferlurate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            //'transaction_how_to_doc' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "rate" => 'required',
            "amount" => 'required',
            "subject"  => 'required',
            "description" => 'required',
            "account_number" => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }


            $transaction_id = 'TX'.time();
            $transaction = new Transaction();
            $transaction->transaction_id = $transaction_id;
            $transaction->lu_id = auth()->user()->user_id;
            $transaction->rate = $request->rate;
            $transaction->min_amount = $request->amount;
            $transaction->max_amount = $request->amount;
            $transaction->payment_type = 'bank transfer';
            $transaction->subject = $request->subject;
            $transaction->website_link = $request->website_link;
            $transaction->description = $request->description;
            $inserted = $transaction->save();

            if($inserted > 0)
            {

                if ($request->hasFile('transaction_how_to_doc')) 
                {
                     $file = $request->file('transaction_how_to_doc');
                        
                     $docFileName = time().uniqid().'.'.$request->transaction_how_to_doc->extension();

                     $file->storeAs('uploads/transaction_how_to_docs', $docFileName, 's3');

                     $datadoc = [
                         'transaction_how_to_doc' =>  $docFileName . '.png',
                     ];


                    $updated = Transaction::where('transaction_id', $transaction_id)->update($datadoc);
                    //$user->notify(new PaymentSuccessful()); 

                }

                $wfr = new WalletFundingRequest();
                $wfr->user_id = auth()->user()->user_id;
                $wfr->transaction_id = $transaction_id;
                $wfr->account_number = $request->account_number;
                $wfr->amount = $request->amount;
                $inserted2 = $wfr->save();
                return response()->json(['inserted' => true, 'transaction_id' => $transaction_id]);
            }    
        
    }

    public function confirmbanktransferconnectlu(Request $request)
    {
        //Check a record here that the LU who connected has actually transfered funds to his virtual account. if confirmed, create transaction
        //For let just create the transaction in the database 

           $data = [
                'lu_id' => auth()->user()->user_id,
                'amount_requested' => $request->amount_requested,
                'subject' => $request->subject,
                'website_link' => $request->website,
                'description' => $request->description,
                'payment_type' => 'Bank transfer',
                
            ];

            $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

            if($updated > 0)
            {

                $user = User::where('user_id', auth()->user()->user_id)->first();

                $wfr = new WalletFundingRequest();
                $wfr->user_id = auth()->user()->user_id;
                $wfr->transaction_id = $request->transaction_id;
                $wfr->account_number = $user->reserved_account_number;
                $inserted2 = $wfr->save();

               // Notification::send(new PaymentConfirmed()); 

                //Create a fresh Transaction for the Foreign User

                $transaction = Transaction::where('transaction_id', $request->transaction_id)->first();

                if($transaction->amount > $request->amount_requested)
                {
                    $amount_new = $transaction->amount - $request->amount_requested;
                    $transaction_id_new = 'TX'.time();

                    $transaction = Transaction::create([
                        'transaction_id' => $transaction_id_new,
                        'fu_id' => $transaction->fu_id,
                        'rate' => $transaction->rate,
                        'amount' => $amount_new
                            
                    ]);

                    $datax = [
                        'max_amount' => $amount_new,
                    ];

                    $updated = User::where('user_id', $transaction->fu_id)->update($datax);
                }
                
                $user->notify(new PaymentSuccessful()); 
                //$user2->notify(new PaymentSuccessfulFU()); 
  

                //Notification::send(new PaymentConfirmed());
               
                return response()->json(['transaction_succeed' => true, 'transaction_id' => $request->transaction_id]);
            }
            else
            {
                return response()->json(['transaction_succeed' => false]);
            }

    }

    public function addforeignuserrate(Request $request)
    {
       
        //We check if user has a pending offer first
        $offer_exists = Transaction::where('fu_id', auth()->user()->user_id)->where('is_taken', 0)->first();

        if($offer_exists == null)
        {
            $check_virtual_account_record = true;

            if($check_virtual_account_record)
            {
                $transaction_id = 'TX'.time();
                $transaction = new Transaction();
                $transaction->transaction_id = $transaction_id;
                $transaction->fu_id = auth()->user()->user_id;
                $transaction->rate = $request->rate;
                $transaction->amount = $request->max_amount;
                $transaction->payment_type = $request->payment_type;
                $inserted = $transaction->save();

                $data3 = [
                    'rate' => $request->rate,
                    'min_amount' => $request->min_amount,
                    'max_amount' => $request->max_amount,
                ];
    
                $updated3 = User::where('user_id', auth()->user()->user_id)->update($data3);

                return redirect('/dashboard/p2p/foreign/3')->with('success_body', 'Your rate has been added/updated successfully');
            }
            else
            {
                return response()->json(['check_virtual_account_record' => false]);
            }

            return response()->json(['check_virtual_account_record' => true]);
        }
        else
        {
           

            $data2 = [
                'rate' => $request->rate,
                'amount' => $request->max_amount,
            ];

            $updated2 = Transaction::where('fu_id', auth()->user()->user_id)->where('is_taken', 0)->update($data2);


            $data3 = [
                'rate' => $request->rate,
                'min_amount' => $request->min_amount,
                'max_amount' => $request->max_amount,
            ];

            $updated3 = User::where('user_id', auth()->user()->user_id)->update($data3);


            return redirect('/dashboard/p2p/foreign/3')->with('success_body', 'Your rate has been added/updated successfully');

        }
                
    }

    public function generatedynamicaccountnumber(Request $request)
    {
        try 
        {
            $response = Http::withHeaders([
                'X-Auth-Signature' => 'BE09BEE831CF262226B426E39BD1092AF84DC63076D4174FAC78A2261F9A3D6E59744983B8326B69CDF2963FE314DFC89635CFA37A40596508DD6EAAB09402C7',
                'Client-Id' => 'dGVzdF9Qcm92aWR1cw=='
            ])->post('http://154.113.16.142:8088/appdevapi/api/PiPCreateDynamicAccountNumber', [
                'account_name' => 'PayHelpa',
            ]);


            return $response;

            
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }

       
        //Store P2P state

       
        // $user = User::where('user_id', auth()->user()->user_id)->first();

        // if($user != null)
        // {
        //     $reserved_account_number = $user->reserved_account_number;

        //     return response()->json(['status' => true, 'account_number' => $reserved_account_number]);
        // }
        // else
        // {
          
        //     return response()->json(['status' => false, 'account_number' => null]);
        // }
        
    }

}
