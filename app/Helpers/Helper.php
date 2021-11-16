<?php

namespace App\Helpers;

class Helper{
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

}
//generate random order id
    
