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
use App\Notifications\AccountVerification;
use Illuminate\Support\Facades\Notification;

class TransactionControllerAPI extends Controller
{

    public function futradetransaction(Request $request)
    {
     
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);
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
                return response()->json([
                    'data' => [
                        'transaction_id' => $request->transaction_id
                    ],
                    'status' => true,
                    'message' => 'Transaction accepted successfully',
                   
                ]);
                
            }
            else
            {
                return response()->json([

                    "status" => false,
                    "message" => "Transaction not accepted",
                
                ]);
            }

        }
        else
        {
            return response()->json(['errors' => 'Transaction not found']);
        }
    }

    public function updatetransactionstatustoongoing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $data = [
            'status' => 1,
        ];

        $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

        if($updated > 0)
        {
            return response()->json([
                'status' => true,
                'message' => 'Transaction status updated to ongoing',
            ]);
            
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'Transaction update failed',
            ]);
        }
    }


    public function updatetransactionstatustocompleted(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
        ]);

        if($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $data = [
            'status' => 2,
        ];

        $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

        if($updated > 0)
        {
            return response()->json([
                'status' => true,
                'message' => 'Transaction status updated to completed',
            ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'message' => 'Error occurred',
            ]);
        }
    }


    public function uploadtransactioncompletedreceipt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'transaction_id' => 'required'
        ]);


        if($validator->fails())
        {
            return response()->json(['errors' => $validator->messages()], 400);
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

                return response()->json([ 
                    'status' => true,
                    'message' => 'Transaction receipt uploaded successfully',
                ]);
               
            }
            else
            {
                return response()->json([ 
                    'status' => false,
                    'message' => 'Error occurred in updating',
                ]);
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

        //We check if user has a pending transaction offer first
        $offer_exists = Transaction::where('lu_id', auth()->user()->user_id)->where('is_taken', 0)->first();

        if($offer_exists != null)
        {
            return response()->json([ 
                'status' => false,
                'message' => 'Can\'t create another transaction. Pending transaction offer exists. Wait till it\'s accepted or you can increase your rate to attract more interests',
            ]);
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
            // Send Email here to LU //


            //Notification::send(new PaymentConfirmed()); 


            // Send Email here to LU //

            // if ($request->hasFile('transaction_how_to_doc')) 
            // {
            // //     $file = $request->file('transaction_how_to_doc');
                    
            // //     $docFileName = time().uniqid().'.'.$request->transaction_how_to_doc->extension();

            // //     $file->storeAs('uploads/transaction_how_to_docs', $docFileName, 's3');

            // //     $datadoc = [
            // //         'transaction_how_to_doc' =>  $docFileName . '.png',
            // //     ];


            // //    $updated = Transaction::where('transaction_id', $transaction_id)->update($datadoc);

            // }

            $wfr = new WalletFundingRequest();
            $wfr->user_id = auth()->user()->user_id;
            $wfr->transaction_id = $transaction_id;
            $wfr->account_number = $request->account_number;
            $inserted2 = $wfr->save();

            return response()->json([ 
                'data' => [
                    'transaction_id' => $transaction_id
                ],
                'status' => true,
                'message' => 'Transaction created successfully',
            ]);

    
        }

        
    }

    public function confirmbanktransferconnectlu(Request $request)
    {
        //Check a record here that the LU who connected has actually transfered funds to his virtual account. if confirmed, connect to FU transaction offer
        //For let just create the transaction in the database 

        $validator = Validator::make($request->all(), [
            //'transaction_how_to_doc' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "transaction_id" => 'required',
            "amount_requested" => 'required',
            "subject"  => 'required',
            "description" => 'required',
            "account_number" => 'required'
        ]);


        if($validator->fails())
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $transaction = Transaction::where('transaction_id', $request->transaction_id)->first();

        if($transaction == null)
        {
            return response()->json([ 
                'status' => false,
                'message' => 'No transaction offer with such ID',
            ]);
        }

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
            // Notification::send(new PaymentConfirmed()); 

            //Create a fresh Transaction for the Foreign User and deduct balance

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

                //Create a funding request for Providus to confirm
                $wfr = new WalletFundingRequest();
                $wfr->user_id = auth()->user()->user_id;
                $wfr->transaction_id = $request->transaction_id;
                $wfr->account_number = $request->account_number;
                $inserted2 = $wfr->save();
    
            }

            //Notification::send(new PaymentConfirmed());

            return response()->json([ 
                'data' => [
                    'transaction_id' => $transaction_id
                ],
                'status' => true,
                'message' => 'Connected successfully with Foreign Helpa',
            ]);
            
        }
        else
        {
            return response()->json([ 
                'status' => false,
                'message' => 'Error occurred',
            ]);
        }

    }

    public function updatelurate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "rate" => 'required',
            "max_amount"  => 'required',
        ]);


        if($validator->fails())
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $transaction_exists = Transaction::where('is_taken', 0)->where('lu_id', auth()->user()->user_id)->first();

        if($transaction_exists == null)
        {
            return response()->json([ 
                'status' => true,
                'message' => 'You have no transaction rate to update. Create your own transaction rate instead',
            ]);
        }

        $data = [
            'rate' => $request->rate,
            'min_amount' => $request->max_amount,
            'max_amount' => $request->max_amount
        ];

        $updated = Transaction::where('is_taken', 0)->where('lu_id', auth()->user()->user_id)->update($data);

        if($updated > 0)
        {
            return response()->json([ 
                'status' => true,
                'message' => 'Rate updated successfully',
            ]);
        }
        else
        {
            return response()->json([ 
                'status' => false,
                'message' => 'Error occurred',
            ]);
           
        }
    }

    public function addupdateforeignuserrate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "rate" => 'required',
            "min_amount" => 'required',
            "max_amount"  => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        //We check if user has a pending offer first
        $offer_exists = Transaction::where('fu_id', auth()->user()->user_id)->where('is_taken', 0)->first();

        if($offer_exists == null)
        {
          
                $transaction_id = 'TX'.time();
                $transaction = new Transaction();
                $transaction->transaction_id = $transaction_id;
                $transaction->fu_id = auth()->user()->user_id;
                $transaction->rate = $request->rate;
                $transaction->min_amount = $request->min_amount;
                $transaction->max_amount = $request->max_amount;
                $inserted = $transaction->save();

                if($inserted > 0)
                {
                    return response()->json([ 
                        'data' => [
                            'transaction_id' => $transaction_id
                        ],
                        'status' => true,
                        'message' => 'Your rate has been added/updated successfully',
                    ]);
                }
                else
                {
                    return response()->json([ 
                        'status' => false,
                        'message' => 'Error occurred. Try again',
                    ]);
                }

        }
        else
        {
           
            $data2 = [
                'rate' => $request->rate,
                'min_amount' => $request->min_amount,
                'max_amount' => $request->max_amount,
            ];

            $updated2 = Transaction::where('fu_id', auth()->user()->user_id)->where('is_taken', 0)->update($data2);


            if($updated2 > 0)
            {
                return response()->json([ 
                    'status' => true,
                    'message' => 'Your rate has been added/updated successfully',
                ]);
            }
            else
            {
                return response()->json([ 
                    'status' => false,
                    'message' => 'Error occurred. Try again',
                ]);
            }

        }
                
    }

    public function getusertransactions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "status" => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $user = User::where('user_id', auth()->user()->user_id)->first();

        if($request->status == "all")
        {
            $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->orderBy('id', 'desc')->get();
          
        }
        elseif($request->status == "pending")
        {
            $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->where('status', 0)->orderBy('id', 'desc')->get();
        }
        elseif($request->status == "ongoing")
        {
            $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->where('status', 1)->orderBy('id', 'desc')->get();
        }
        elseif($request->status == "completed")
        {
            $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->where('status', 2)->orderBy('id', 'desc')->get();
        }
        else
        {
            $transactions = Transaction::where('fu_id', auth()->user()->user_id)->orWhere('lu_id', auth()->user()->user_id)->orderBy('id', 'desc')->get();
        }

       
        return response()->json([ 
            'data'  => $transactions,
            'status' => true,
            'message' => 'Transactions List',
        ]);
        
    }

    public function transactiondetails($id)
    {
        $validator = Validator::make($request->all(), [
            "id" => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $user = User::where('user_id', auth()->user()->user_id)->first();
        $transaction = Transaction::where('transaction_id', $id)->first();
        return response()->json([ 
            'data' => $transaction,
            'status' => true,
            'message' => 'Transaction details',
        ]);
    }

}
