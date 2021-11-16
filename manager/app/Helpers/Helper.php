<?php

namespace App\Helpers;

class Helper{
    public function generateAccountNum($number)
    {
        $today = date('YmdHis');
        $characters = '0123456789';
        $main = $today."". $characters;
        $randomString = '';
        for ($i = 0; $i < $number; $i++) {
            $index = rand(0, strlen($main) - 1);
            $randomString .= $main[$index];
        }
        return $randomString;
    }
}
//generate random order id
    
