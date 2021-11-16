<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rating;
use App\Models\Transaction;
use App\Models\Review;

class RatingController extends Controller
{
    public function rateuser(Request $request)
    {
        $data = [
            'transaction_id' => $request->transaction_id,
            'user_id' => $request->user_id,
            'score' => $request->score,
        ];

        $inserted = Rating::insertOrIgnore($data);


        if($inserted > 0)
        {
            $rated = [
                'is_rated' => 1
            ];

            Transaction::where('transaction_id', $request->transaction_id)->update($rated);

            return response()->json(['rated' => true]);
        }
        else
        {
            return response()->json(['rated' => false]);
        }

    }

    public function userreview(Request $request)
    {
        $review = Review::create([
            'reviewer_id' => auth()->user()->user_id,
            'reviewee_id' => $request->reviewee_id,
            'comment' => $request->comment,
        ]); 

        if(!is_null($review))
        {
            $data = [
                'is_reviewed' => 1
            ];

            $updated = Transaction::where('transaction_id', $request->transaction_id)->update($data);

            return response()->json(['reviewed' => true]);
        }
        else
        {
            return response()->json(['reviewed' => false]);
        }
        
     }
     
}
