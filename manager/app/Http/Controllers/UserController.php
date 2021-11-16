<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\AccountVerificationEmail;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;
use Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use App\Helpers\Helper;
//use \Illuminate\Notifications\Notifiable; 
use \Illuminate\Notifications\RoutesNotifications;
 

class UserController extends Controller
{
    private $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }  
 
    public function user(){
         $userss = DB::table('users')->get();
         return view('users', compact('userss'));
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
     public static function GetUser_ID($id)
    {
        // $userss = DB::table('users')->where('id', $id)->select('name')->get();
        $post = User::where('id', $id)->select('user_id')->first();
        
    }
    public function user_details($id){
         $userss = DB::table('users')->where('id',$id)->get();
         return view('user_details', compact('userss'));
    }
    
    public function message(Request $request, $user_id){
          $user = DB::table('users')
         ->select('email')
         ->where('user_id', $user_id)->first();
         $email = $user->email;
         return view('message',compact('email'));
    }
     public function messagesend(Request $request){
         $content = [
             "subject"=>"New Message from PayHelpa",
             "details"=>$request->details
         ];
         Mail::to($request->email)->send(new NewMessage($content, $request));
         
       /* $data = array('details'=>$request->details);
            
        Mail::send('email/sample-mail', $content, function($message) use ($content, $request){
            $message->from ('test@switfx.com');
            $message->to($request->email);
            // $message->to('titi.adesola@gmail.com');
            $message->subject($content['details']);
        });*/
        
            //return $request->all();
        return redirect('ongoingstatus')->with('success','Message Sent!');
    }
    
    
    public function transactions(){
        $post = DB::table('transactions')
                /*->join('users', 'transactions.user', '=', 'users.id')*/
                ->select(/*'transactions.id','users.name', */'id','transaction_id', 'amount', /*'transactions.rate_type',*/ 'rate' /*'transactions.datee'*/)
                ->get();

        return view('transactions', compact('post'));
        
    }
    public function update_status($id){
        $post = DB::table('users')
                ->select('active_status')
                ->where('id', '=' ,$id )
                ->first();

                if ($post->active_status == 9) {
                     $status = 1;
                }
                else{
                     $status = 9;
                }
                $val = array('active_status' => $status); 
            DB::table('users')->where('id',$id)->update($val);
            return redirect('users');
    }
    public function selectuser(){
         return view('selectuser');
                         
     }

 public function localUsersStatus(){
        $post = DB::table('transactions')
        //->join('users', 'transactions.user', '=', 'users.id')
        ->select(/*'users.name',*/'id','rate','amount')
        ->where('transactions.status', 2)
        ->get();
        return view('localUsersStatus', compact('post'));
    }
     public function foreignUsersStatus(){
        $post = DB::table('transactions')
        ->join('users', 'transactions.user', '=', 'users.id')
        ->select(/*'users.name',*/'id','rate','amount')
        ->where('transactions.status', 2)
        ->orWhere('users.is_foreign_user', 1)
        ->get();
        return view('foreignUsersStatus', compact('post'));
    }
    /*public function status(){
        //$user= DB::table('users')
        
    }*/
    
     public function status(){
        $post = DB::table('transactions')
        ->where('transactions.status', 2)
         ->where('is_taken', 1)
        ->get();
        //return $post;
        return view('status', compact('post'));
    }
    
     public function successinfo($transaction_id){
       $post = DB::table('transactions')->where('transaction_id', $transaction_id)->get();
        return view('successinfo', compact('post'));
    }
    
    public function ongoingstatus(){
        $post = DB::table('transactions')
         ->where('transactions.status', 1)
        ->where('is_taken', 1)
        ->get();
        return view('ongoingstatus', compact('post'));
    }
    
    public function statusdeclined(){
         $post = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
         
        //$post = DB::table('transactions')
        ->where('transactions.status', 0)
        ->where('transactions.is_taken', 0)
       //->orWhere('transactions.status', 2)
        ->get();
        return view('pendingstatus', compact('post'));
    }
     public function pendinginfo($transaction_id){
       $post = DB::table('transactions')->where('transaction_id', $transaction_id)->get();
        return view('pendinginfo', compact('post'));
    }
    public function verify(){
        $users = DB::table('users')->where('kyc_submitted', 1)->get();
        return view('verify', compact('users'));
    }
   
     public function update_verify(Request $request, $id){

        $post = User::where('id', '=' ,$id)->first();

                      $response = Http::withHeaders([
                    'X-Auth-Signature' => 'BE09BEE831CF262226B426E39BD1092AF84DC63076D4174FAC78A2261F9A3D6E59744983B8326B69CDF2963FE314DFC89635CFA37A40596508DD6EAAB09402C7',
                    'Client-Id' => 'cEBZSDMxTHBhX1ByMCgpLg==',
                    'Secret'=> 'CC1BF237E7EDD89DB08A804F5B8A16E7DBDE4432664BDD54C6AD943CD6F6F012'
                ])->post('http://154.113.16.142:8088/appdevapi/api/PiPCreateDynamicAccountNumber', [
                    'account_name' => 'PayHelpa',
                ]);
                $account_number = json_decode($response);
                if($response->status() == 200){
                    if($account_number->requestSuccessful == TRUE){
                    $post->update([
                        'reserved_account_number'=> $account_number->account_number,
                   ]);
                   $val = array('kyc_submitted' => 0,
                        'kyc_verified' => 1); 
                        DB::table('users')->where('id',$id)->update($val);
                        $post->notify(new AccountVerificationEmail());
                        Alert::success('User has been verified');
                        return redirect('verify')->with('success','User has been verified!');

                    }
                }
                else{
                    Alert::error('Account was not generated, user not verified');
                        return redirect('verify')->with('error','Account was not generated, user not verified');

                }
               /* if ($response->status() == 200 || $account_number->requestSuccessful == TRUE){
                    $post->update([
                        'reserved_account_number'=> $account_number->account_number,
                        //'kyc_verified' => 1,
                        //'kyc_submitted' => 1,
                    ]);
                    
                    // if ($post->kyc_submitted == 0) {
                    //  $kyc_submitted = 1;
                    // } else{
                    //  $kyc_submitted = 0;
                    // }
                        $val = array('kyc_submitted' => 0,
                        'kyc_verified' => 1); 
                        DB::table('users')->where('id',$id)->update($val);
                }
                
                else {
                    return redirect('verify')->with('error','User was not verified!');
                }      
                //$post->kyc_submitted = 1;
                //$name ='name';
                 $name = User::where('id', '=' ,$id)->select('name')->first();


                
          //  $vermail = User::find($id);
          $post->notify(new AccountVerificationEmail($name));*/
           // $vermail->notify(new AccountVerificationEmail());
        /* Alert::success('User has been verified');
            return redirect('verify')->with('success','User has been verified!');*/
           // Notification::send($users, new AccountVerificationEmail());
        //$users->notify(new AccountVerificationEmail());
        
        /*foreach ($users as $user) {
            $user->notify(new AccountVerificationEmail());
        }*/

    }
   
    
     
    public function show($id){
        $users = DB::table('users')->where('id',$id)->get();
        return view('show', compact('users'));
    }
    public function showimage($id){
        $users = DB::table('users')->where('id',$id)->get();
        return view('showimage', compact('users'));
    }
}


/*
$response = Http::withHeaders([
    'X-Auth-Signature' => 'BE09BEE831CF262226B426E39BD1092AF84DC63076D4174FAC78A2261F9A3D6E59744983B8326B69CDF2963FE314DFC89635CFA37A40596508DD6EAAB09402C7',
    'Client-Id' => 'dGVzdF9Qcm92aWR1cw=='
])->post('http://154.113.16.142:8088/appdevapi/api/PiPCreateDynamicAccountNumber', [
    'account_name' => 'PayHelpa',
]);

}
return $response;


http://154.113.16.142:8088/appdevapi/api/PiPCreateReservedAccountNumber
{
  "account_name" : "PayHelpa",
  "bvn" : ""
}


Client-Id = dGVzdF9Qcm92aWR1cw==

X-Auth-Signature = BE09BEE831CF262226B426E39BD1092AF84DC63076D4174FAC78A2261F9A3D6E59744983B8326B69CDF2963FE314DFC89635CFA37A40596508DD6EAAB09402C7

*/