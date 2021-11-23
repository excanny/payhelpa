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

class KYCControllerAPI extends Controller
{
    public function verifyphoneforeign(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }
        
        $otp_value = rand(100000,999999);

        $user_id = auth()->user()->user_id;

        $otp = new OTPPhone();
        $otp->user_id = $user_id;
        $otp->otp = $otp_value;
        $otp->phone = $request->phone;
        $inserted = $otp->save();

        //return $inserted;

        if($inserted > 0)
        {
             //Set as foreign user
             $data = [
    
                'is_foreign_user' => '1'
            ];
            
            $updated = User::where('user_id', auth()->user()->user_id)->update($data);
            
            $receiverNumber = "+1".$request->phone;
            $message = "This is your PayHelpa phone number verification token". ' ' . $otp_value;
  
            try 
            {
    
                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");
    
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number, 
                    'body' => $message]);
    
                //dd('SMS Sent Successfully.');

                return response()->json([ 
                    'status' => true,
                    'message' => 'SMS with OTP sent to your phone number',
                ]);  
    
            } 
            catch (\Twilio\Exceptions\RestException $e) 
            {
                return response()->json([ 
                    'status' => false,
                    'message' => $e->getMessage()
                ]);
            }

        }
        else
        {
            return response()->json([ 
                'status' => false,
                'message' => 'Error occured! Retry again'
            ]);
            
        }
    }

    public function verifyphonelocal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);
        }

        $otp_value = rand(100000,999999);

        $user_id = auth()->user()->user_id;

        $otp = new OTPPhone();
        $otp->user_id = $user_id;
        $otp->otp = $otp_value;
        $otp->phone = $request->phone;
        $inserted = $otp->save();

        if($inserted > 0)
        {
            //Set as local user
            $data = [
            'is_foreign_user' => '0'
            ];

            $updated = User::where('user_id', auth()->user()->user_id)->update($data);

            $phone = $request->phone;

            $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
                    // // Remove "-" from number
            $phone_to_check = str_replace("-", "", $filtered_phone_number);

            $receiverNumber = "+234". $phone_to_check;
            $message = "This is your PayHelpa phone number verification token". ' ' . $otp_value;

            try 
            {
    
                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");
    
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number, 
                    'body' => $message]);
    
                return response()->json([ 
                    'status' => true,
                    'message' => 'SMS with OTP sent to your phone number',
                ]);   
    
            } 
            catch (\Twilio\Exceptions\RestException $e) 
            {
                return response()->json([ 
                    'status' => false,
                    'message' => $e
                ]);
            }

        }
        else
        {
            return response()->json([ 
                'status' => false,
                'message' => 'Error occured! Retry again'
            ]);
        }
    
    }


    public function verifyphoneotp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'digit1' => 'required',
            'digit2' => 'required',
            'digit3' => 'required',
            'digit4' => 'required',
            'digit5' => 'required',
            'digit6' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);   
        }


        //return $request->all();

        $full_otp = $request->digit1 . $request->digit2 . $request->digit3 . $request->digit4 . $request->digit5 . $request->digit6;
        
        $date = new DateTime;
        $date->modify('-10 minutes');
        $formatted_date = $date->format('Y-m-d H:i:s');

        $otp_exists = OTPPhone::where('user_id', auth()->user()->user_id)->where('otp', $full_otp)->where('phone', $request->phone)->first();
        
        if($otp_exists == null)
        {
            return response()->json(['errors' => 'Invalid OTP! Try again'], 400);
        }
        else
        {

            $otp_active = OTPPhone::where('user_id', auth()->user()->user_id)->where('created_at', '>=', $formatted_date)->where('otp', $full_otp)->where('phone', $request->phone)->first();
            
            if($otp_active != null)
            {
                    $data = [
                        'number_verified' => 1,
                    ];

                    $updated = User::where('user_id', auth()->user()->user_id)->update($data);

                    if($updated > 0)
                    {
                        //$user->notify(new PhoneVerified());
                        return response()->json([ 
                            'status' => true,
                            'message' => 'Phone number verified successfully',
                        ]); 
                    }
                    else
                    {
                        return response()->json([ 
                            'status' => false,
                            'message' => 'Error occured! Retry again',
                        ]); 
                    }

                }
                else
                {
                    return response()->json([ 
                        'status' => false,
                        'message' => 'OTP expired',
                    ]);
                }
        }
        
    }


    public function generateotp(Request $request)
    {
        // generate OTP
		$otp_value = rand(100000,999999);

        $user_id = auth()->user()->user_id;

        $otp = new OTP();
        $otp->user_id = $user_id;
        $otp->otp = $otp_value;
        $inserted = $otp->save();

        //return response()->json($inserted);

        if($inserted)
        {
            try
            {
                $details = [
                    'title' => 'Generated OTP',
                    'body' => 'Your generated OTP is' . ' ',
                    'otp_value' => $otp_value
                ];

                Mail::to(auth()->user()->email)->send(new OTPMail($details));
                return response()->json(['sent' => 1]);
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }
            
        }
        else
        {
            return response()->json(['sent' => 0]);
        }
    }

    public function resendotp(Request $request)
    {
        // generate OTP
		$otp_value = rand(100000,999999);

        $user_id = auth()->user()->user_id;

        $otp = new OTP();
        $otp->user_id = $user_id;
        $otp->otp = $otp_value;
        $inserted = $otp->save();

        //return response()->json($inserted);

        if($inserted)
        {
            try
            {
                $details = [
                    'title' => 'Generated OTP',
                    'body' => 'Your generated OTP is' . ' ',
                    'otp_value' => $otp_value
                ];

                Mail::to(auth()->user()->email)->send(new OTPMail($details));
                return response()->json(['sent' => 1]);
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }
            
        }
        else
        {
            return response()->json(['sent' => 0]);
        }
    }


    public function loadotpwithdraw()
    {
        $output = "";

 
        
        $otp_available = OTP::where('user_id', auth()->user()->user_id)->whereBetween('created_at', [Carbon::now()->addHour()->format('Y-m-d H:i:s'), Carbon::now()->addHours(2)->format('Y-m-d H:i:s') ])->first();

         if(empty($otp_available))
         {
             $output = '
                <div class="form-group">
                        <label for="amount">Please Generate OTP</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control border border-right-0" placeholder="Enter Generated OTP" id="otp_email">
                        <div class="input-group-append">
                            <span class="input-group-text bg-white cursor" style="color:#979797"> <a href="javascript:void" id="generateotp">Generate OTP</a> <i id="generateotpspinner" class="fa fa-spinner fa-pulse text-primary" style="display:none"></i></span>
                        </div>
                        </div>
                        <small class="form-text text-muted">Copy or type the OTP sent to your phone.</small>
                    </div>
             ';
         }
         else
         {
          
            $output .= '
                <div class="form-group">
                <label for="amount">Please Generate OTP</label>
                <div class="input-group mb-3">
                <input type="text" class="form-control border border-right-0" placeholder="Enter Generated OTP" id="otp_email">
                <div class="input-group-append">
                    <span class="input-group-text bg-white cursor" style="color:#979797"> <a href="javascript:void" id="resendotp" class="text-danger">Resend OTP  <i id="resendotpspinner" class="fa fa-spinner fa-pulse text-primary" style="display:none"></i> </a> </span>
                </div>
                </div>
                <small class="form-text text-muted">Copy or type the OTP sent to your phone.</small>
            </div>
            ';

        
         }
        
         
         $data = array(
            'loadotpwithdraw' => $output,
        
         );	

        return response()->json($data);
    }

    public function uploadkyclocal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'idcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'state' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);   
        }


        $result = DB::transaction(function () use ($request)
        {

            define('UPLOAD_DIR', 'uploads/photos/');
            $img = $request->photo;
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $actualFileName = uniqid();
            $photoFile = UPLOAD_DIR .  $actualFileName . '.png';
            //$success = file_put_contents($photoFile, $data);
            //print $success ? $file : 'Unable to save the file.';

            $success =  Storage::disk('s3')->put($photoFile, $data);

            if($success)
            {
                if ($request->hasFile('idcard')) 
                {
                    $file = $request->file('idcard');
                        
                    $IDfileName = time().uniqid().'.'.$request->idcard->extension();

                    //$request->idcard->move(public_path('uploads/idcards'), $IDfileName);

                    $file->storeAs('uploads/idcards', $IDfileName, 's3');

                    $data = [
                        'snap_shot' =>  $actualFileName . '.png',
                        'id_card' =>  $IDfileName,
                        'kyc_submitted' =>  1,
                        'state' => $request->state,
                        'address' => $request->address,
                    ];

                    $updated = User::where('user_id', auth()->user()->user_id)->update($data);

                    return response()->json([ 
                        'status' => true,
                        'message' => 'KYC submitted successfully',
                    ]); 
        
                }
                else
                {
                    return response()->json([ 
                        'status' => false,
                        'message' => 'Error occured! Try again.',
                    ]); 
                }
            }
            else
            {
                return response()->json([ 
                    'status' => false,
                    'message' => 'Error occured! Try again.',
                ]); 
        
            }


        });

        return response()->json($result);

    }

    public function uploadkycforeign(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'idcard' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['errors' => $validator->messages()], 400);   
        }

        $result = DB::transaction(function () use ($request)
        {

            define('UPLOAD_DIR', 'uploads/photos/');
            $img = $request->photo;
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $actualFileName = uniqid();
            $photoFile = UPLOAD_DIR . $actualFileName . '.png';
            //$success = file_put_contents($photoFile, $data);
            //print $success ? $file : 'Unable to save the file.';

            $success =  Storage::disk('s3')->put($photoFile, $data);

            if($success)
            {
                if ($request->hasFile('idcard')) 
                {
                    $file = $request->file('idcard');
                        
                    $IDfileName = time().uniqid().'.'.$request->idcard->extension();

                    //$request->idcard->move(public_path('uploads/idcards'), $IDfileName);

                    $file->storeAs('uploads/idcards', $IDfileName, 's3');

                    $data = [
                        'snap_shot' => $actualFileName . '.png',
                        'id_card' =>  $IDfileName,
                        'kyc_submitted' =>  1,
                    ];

        
                    $updated = User::where('user_id', auth()->user()->user_id)->update($data);

                    return response()->json([ 
                        'status' => true,
                        'message' => 'KYC submitted successfully',
                    ]);
        
                }
                else
                {
                    return response()->json([ 
                        'status' => false,
                        'message' => 'Error occured! Try again.',
                    ]);
                }
            }
            else
            {
                return response()->json([ 
                    'status' => false,
                    'message' => 'Error occured! Try again.',
                ]);
            }


        });

        return response()->json($result);

    }

    public function updatekycaction(Request $request)
    {
        $data = [
            'state' => $request->state,
            'address' => $request->address,
        ];

        //return $data;

        $updated = User::where('user_id', auth()->user()->user_id)->update($data);

        if($updated > 0)
        {
            return back()->with('success', 'KYC updated successfully');
        }
        else
        {
            return back()->with('error', 'Error occurred! Try again');
        }

    }

}
