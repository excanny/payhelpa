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
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;

class UserControllerAPI extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'is_business' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->getMessages()], 400);
        }

     
        $user_id = time();

        $hash = openssl_random_pseudo_bytes(16);
        $hash = bin2hex($hash);
       
        $individual_daily_limit = 1000;

        $business_daily_limit = 5000;

        if($request->is_business == 0)
        {
            $daily_transaction_limit = $individual_daily_limit;
        }
        else
        {
            $daily_transaction_limit = $business_daily_limit;
        }


        try 
        {
            $user = User::create([
                'user_id' => time(),
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_business' => $request->is_business,
                'daily_transaction_limit' => 1000,
            ]);

           event(new Registered($user));

            return response()->json([

                'status' => true,
                'message' => 'User created successfully',
               
            ],201);


        } 
        catch (\Throwable $th) 
        {
            //throw $th;
            return response()->json([

                'status' => false,
                'message' => 'Error occurred',
                'error' => $th
               
            ]);
        }

        


        $email = $request->email;


        // $details = [
        //             'title' => 'Mail from ItSolutionStuff.com',
        //             'body' => 'Verify your email: 12345667',
        //         ];
               
        // Mail::to($email)->send(new MyTestMail($details));

        // $logged = Auth::attempt(['email' =>  $email, 'password' => $request->password]);
    }

    public function login(Request $request)
    {
    
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }


        try 
        {
            if (! $token = JWTAuth::attempt($credentials)) 
            {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }

            return $this->createNewToken($token);
        } 
        catch (JWTException $e) 
        {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

    }

    public function getuserdetails()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        return response()->json([ 
            'data' => $user,
            'status' => true,
            'message' => 'User\'s details',
        ]); 
    }
    

    public function updateprofile(Request $request)
    {
        $data = [
            'name' => $request->name,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'bank_account_number' => $request->bank_acc_no,
            'dob' => $request->dob,
            'bank_name' => $request->bank_name,
            'name' => $request->name,
            'name' => $request->name,
        ];

        //return $data;

            $updated = User::where('user_id', auth()->user()->user_id)->update($data);

            return response()->json($updated);

    }

    public function loadprofle()
    {
       
        $output = "";
        
        $user = User::where('user_id', auth()->user()->user_id)->first();

         if(empty($user))
         {
             $output = '<option value="">None found</option>';
         }
         else
         {
            if(empty($user->profile_image))
            {
                $avatar = "<span class='fa fa-user-circle fa-5x'></span>";
            }
            else
            {
                $avatar = "<img src='https://payhelpa.s3.eu-west-3.amazonaws.com/uploads/profile_pictures/$user->profile_image' class='rounded-circle' width='80px' height='80px'>";
            } 

            $output .= '
            <div class="card-body">
                                       
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-3">
                                <span class="align-middle">'.$avatar.'</span>
                            </div>
                            <div class="col-lg-9 text-left">
                           
                            <label for="profile_pic" style="margin-top: 2rem;">
                                <span class="cursor text-primary" style="font-style: normal; font-size: 16px; line-height: 19px; letter-spacing: 0.005em; color: #0F2744;"> Change profile photo </span>
                            </label>
                            <input type="file" name="profile_pic" id="profile_pic" accept="image/*" style="display:none;"> 
                            </div>
                        </div>

                      
                        
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="amount">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="'.$user->name.'">
                        </div>

                        
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="amount">Occupation</label>
                            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter occupation" value="'.$user->occupation.'">
                        </div>
                    </div>

                    
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        

                        <div class="form-group">
                            <label for="amount">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" value="'.$user->address.'">
                        </div>

                        
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="amount">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="'.$user->email.'">
                        </div>
                    </div>

                    
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        

                        <div class="form-group">
                            <label for="amount">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="'.$user->phone.'">
                        </div>

                        
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="amount">Account Number</label>
                            <input type="text" class="form-control" name="bank_acc_no" id="bank_acc_no" placeholder="Enter bank account number" value="'.$user->bank_account_number.'">
                        </div>
                    </div>

                    
                </div>

                
                <div class="row mt-3">
                    <div class="col-lg-6">
                        

                        <div class="form-group">
                            <label for="amount">Date of birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="'.$user->dob.'">
                        </div>

                        
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="amount">Bank name</label>
                            <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter bank name" value="'.$user->bank_name.'">
                        </div>
                    </div>

                    
                </div>
            ';

        
         }
        
         
         $data = array(
            'user_profile' => $output,
        
         );	

        return response()->json($data);
    }

   
    public function changepassword(Request $request)
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();

        if (Hash::check($request->old_password, $user->password)) 
        {
            // The passwords match...
            $data = [
                'password' => Hash::make($request->new_password),
               
            ];
    
            //return $data;
    
            $updated = User::where('user_id', auth()->user()->user_id)->update($data);
    
            return response()->json($updated);
            //return response()->json('true');
        }
        else
        {
            return response()->json('no no');
        }

        //return response()->json($user->password);
    }

    public function showpersonaldata(Request $request)
    {

         $data = [
            'show_personal_info' => $request->value,
           
        ];

        //return $data;

        $updated = User::where('user_id', auth()->user()->user_id)->update($data);

        return response()->json($updated);
    }

    public function loadshowpersonalinfo()
    {
       
        $output = "";
        
        $user = User::where('user_id', auth()->user()->user_id)->first();

         if(empty($user))
         {
             $output = '<option value="">None found</option>';
         }
         else
         {
            
            if($user->show_personal_info == 1)
            {
                $checked = "checked";
            }
            else
            {
                $checked = "";
            }

            $output .= '
                <div class="form-group pl-4">
                    <h3 class="">Personal data</h3>
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input cursor" id="switchpersonaldata" '.$checked.'> 
                    <label class="custom-control-label cursor" for="switchpersonaldata">Show your personal information in the sellers profile.</label> 
                    </div>
                </div>
            ';

        
         }
        
         
         $data = array(
            'personalinfobox' => $output,
        
         );	

        return response()->json($data);
    }

    public function checkuserverificationstatus()
    {
        $user = User::where('user_id', auth()->user()->user_id)->select('kyc_verified')->first();
        if($user->kyc_verified == 0)
        {
            //session()->flash('user_not_verified', 'true');
            Session::put('user_not_verified', 'true');
            return response()->json(['user_verified' => 0]);
        }
        else
        {
            return response()->json(['user_verified' => 1]);
        }
    }

    public function uploadprofilepic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_pic')) 
        {
            $file = $request->file('profile_pic');
                
            $photofileName = time().uniqid().'.'.$request->profile_pic->extension();

            $file->storeAs('uploads/profile_pictures', $photofileName, 's3');

            $data = [
                'profile_image' =>  $photofileName,
            ];

            return $updated = User::where('user_id', auth()->user()->user_id)->update($data);
        }
    }


    public static function GetUserName($user_id)
    {
        $user = User::where('user_id', $user_id)->select('name')->first();
        if($user != null)
        {
            echo $user->name;
        }
        else
        {
            echo "";
        }
        
    }

    public static function GetUserEmail($user_id)
    {
        $user = User::where('user_id', $user_id)->select('email')->first();
        if($user != null)
        {
            echo $user->email;
        }
        else
        {
            echo "";
        }
        
    }

    public static function GetUserRating($user_id)
    {
        $rating = Rating::where('user_id', $user_id)->avg('score');
        return $rating;
    }

    public static function GetUserCompletionRate($user_id)
    {
      
        $transaction_count = Transaction::where('fu_id', $user_id)->where('is_taken', 1)->count();
        //return $transaction->count();
        if($transaction_count < 1)
        {
            return 'No transactions carried out yet';
        }
        else
        {
            $transaction_completion_count = Transaction::where('fu_id', $user_id)->where('status', 2)->count();
            $completed_ratio = ($transaction_completion_count / $transaction_count) * 100; 
            return $completed_ratio . '% completion';
            //return 2;
        }

    }

    public static function GetUserMax($user_id)
    {
        $max = User::where('user_id', $user_id)->select('max_amount')->first();

        if($max != null)
        {
            return $max->max_amount;
        }
    }

    public static function GetUserMin($user_id)
    {
        $min = User::where('user_id', $user_id)->select('min_amount')->first();
        if($min != null)
        {
            return $min->min_amount;
        }
        
    }

    public static function GetUserSnapShot($user_id)
    {
        $user = User::where('user_id', $user_id)->select('snap_shot')->first();
        echo $user->snap_shot;
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token
        ]);
    }

}
