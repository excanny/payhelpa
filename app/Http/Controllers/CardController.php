<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Card;

class CardController extends Controller
{
    public function addcard(Request $request)
    {
        //return $request->all();
        $validator = \Validator::make($request->all(), [
            'card_no' => 'required',
            'card_expiry' => 'required',
            'card_cvv' => 'required',

        ]);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->withInput()->with('error', $messages->first());
        }
        
        $user_id = auth()->user()->user_id;

        $card = new Card();
        $card->user_id = $user_id;
        $card->card_no = $request->card_no;
        $card->card_expiry = $request->card_expiry;
        $card->card_cvv = $request->card_cvv;
        $inserted = $card->save();

        if($inserted > 0)
        {
            
            return back()->with('success', 'Card added successfully');
        }
        else
        {
            return back()->with('error', 'Error occurred! Try again');
        }

    }
}
