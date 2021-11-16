<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'is_business' => ['required'],
        ]);

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

        $user = User::create([
            'user_id' => time(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_business' => $request->is_business,
            'daily_transaction_limit' => $daily_transaction_limit,
        ]);

        event(new Registered($user));

         Auth::login($user);

         return redirect(RouteServiceProvider::VERIFYEMAIL);

    }
}
