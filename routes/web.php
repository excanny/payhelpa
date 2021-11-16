<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\KYCController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\P2PController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('layouts.test');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/careers', function () {
    return view('careers');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/register/individual', function () {
    return view('auth/individualregister');
});

Route::get('/register/business', function () {
    return view('auth/businessregister');
});

Route::get('/registersuccess', function () {
    return view('auth/registersuccess');
});


Route::get('/verify-email-success', function () {
    return view('auth/verify-email-success');
});


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');




Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/p2p', [P2PController::class, 'p2p'])->middleware(['auth', 'verified'])->name('p2p');
Route::get('/dashboard/p2p/foreign', [DashboardController::class, 'p2pforeign'])->middleware(['auth', 'verified'])->name('p2pforeign');
Route::get('/dashboard/p2p/foreign/2', [DashboardController::class, 'p2pforeigntwo'])->middleware(['auth', 'verified'])->name('p2pforeigntwo');
Route::get('/dashboard/p2p/foreign/3', [DashboardController::class, 'p2pforeignthree'])->middleware(['auth', 'verified'])->name('p2pforeignthree');
Route::get('/dashboard/wallet', [DashboardController::class, 'wallet'])->middleware(['auth', 'verified'])->name('wallet');
Route::get('/dashboard/withdraw', [DashboardController::class, 'withdraw'])->middleware(['auth', 'verified'])->name('withdraw');
Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');
Route::get('/dashboard/kyc', [DashboardController::class, 'kyc'])->middleware(['auth', 'verified'])->name('kyc');
Route::get('/dashboard/security', [DashboardController::class, 'security'])->middleware(['auth', 'verified'])->name('security');
Route::get('/dashboard/status', [DashboardController::class, 'status'])->middleware(['auth', 'verified'])->name('status');
Route::get('/dashboard/status/completed', [DashboardController::class, 'statuscompleted'])->middleware(['auth', 'verified'])->name('status.completed');
Route::get('/dashboard/status/pending', [DashboardController::class, 'statuspending'])->middleware(['auth', 'verified'])->name('status.pending');
Route::get('/dashboard/status/ongoing', [DashboardController::class, 'statusongoing'])->middleware(['auth', 'verified'])->name('status.ongoing');
Route::get('/dashboard/kyc/1', [DashboardController::class, 'kycone'])->middleware(['auth', 'verified'])->name('kycone');
Route::get('/dashboard/kyc/2/{slug}', [DashboardController::class, 'kyctwo'])->middleware(['auth', 'verified'])->name('kyctwo');
Route::get('/dashboard/kyc/3', [DashboardController::class, 'kycthree'])->middleware(['auth', 'verified'])->name('kycthree');
Route::post('/verify/phone/otp', [KYCController::class, 'verifyphoneotp'])->middleware(['auth', 'verified'])->name('verifyphoneotp');

Route::post('verify/phone/local', [KYCController::class, 'verifyphonelocal'])->middleware(['auth', 'verified'])->name('verifyphonelocal');
Route::post('verify/phone/foreign', [KYCController::class, 'verifyphoneforeign'])->middleware(['auth', 'verified'])->name('verifyphoneforeign');
Route::get('/dashboard/phone/verified', [DashboardController::class, 'phoneverified'])->middleware(['auth', 'verified'])->name('phoneverified');
Route::post('/updateprofile', [UserController::class, 'updateprofile'])->middleware(['auth', 'verified'])->name('updateprofile');
Route::get('/loadprofile', [UserController::class, 'loadprofile'])->middleware(['auth', 'verified'])->name('loadprofile');
Route::post('/changepassword', [DashboardController::class, 'changepassword'])->middleware(['auth', 'verified'])->name('changepassword');
Route::post('/showpersonaldata', [DashboardController::class, 'showpersonaldata'])->middleware(['auth', 'verified'])->name('showpersonaldata');
Route::get('/loadshowpersonalinfo', [UserController::class, 'loadshowpersonalinfo'])->middleware(['auth', 'verified'])->name('loadshowpersonalinfo');
Route::post('/showaccountbalance', [DashboardController::class, 'showaccountbalance'])->middleware(['auth', 'verified'])->name('showaccountbalance');
Route::get('/loadaccountbalance', [DashboardController::class, 'loadaccountbalance'])->middleware(['auth', 'verified'])->name('loadaccountbalance');
Route::post('/shownotifications', [DashboardController::class, 'shownotifications'])->middleware(['auth', 'verified'])->name('shownotifications');
Route::get('/loadshownotifications', [DashboardController::class, 'loadshownotifications'])->middleware(['auth', 'verified'])->name('loadshownotifications');
Route::post('/addcard', [CardController::class, 'addcard'])->middleware(['auth', 'verified'])->name('addcard');
Route::post('/generateotp', [KYCController::class, 'generateotp'])->middleware(['auth', 'verified'])->name('generateotp');
Route::post('/resendotp', [KYCController::class, 'resendotp'])->middleware(['auth', 'verified'])->name('resendotp');
Route::get('/loadotpwithdraw', [KYCController::class, 'loadotpwithdraw'])->middleware(['auth', 'verified'])->name('loadotpwithdraw');
Route::post('/changebank', [DashboardController::class, 'changebank'])->middleware(['auth', 'verified'])->name('changebank');
Route::post('/uploadkyc', [KYCController::class, 'uploadkyc'])->middleware(['auth', 'verified'])->name('uploadkyc');
Route::post('/uploadkyc/foreign', [KYCController::class, 'uploadkycforeign'])->middleware(['auth', 'verified'])->name('uploadkycforeign');
Route::get('/dashboard/kyc/verified', [DashboardController::class, 'kycverified'])->middleware(['auth', 'verified'])->name('kycverified');
Route::get('/dashboard/kyc/submitted', [DashboardController::class, 'kycsubmitted'])->middleware(['auth', 'verified'])->name('kycsubmitted');
Route::get('/dashboard/kyc/updatekyc', [DashboardController::class, 'updatekyc'])->middleware(['auth', 'verified'])->name('updatekyc');
Route::post('/dashboard/kyc/updatekyc', [KYCController::class, 'updatekycaction'])->middleware(['auth', 'verified'])->name('updatekyc');
Route::post('/card/pay/lu', [TransactionController::class, 'cardpaylu'])->middleware(['auth', 'verified'])->name('cardpaylu');
Route::post('/card/pay/lu/input/rate', [TransactionController::class, 'cardpayluinputrate'])->middleware(['auth', 'verified'])->name('cardpayluinputrate');
Route::get('/dashboard/transaction/{transaction_id}/details', [DashboardController::class, 'transactiondetails'])->middleware(['auth', 'verified'])->name('transactiondetails');
Route::post('/transaction/create/lu', [TransactionController::class, 'transactioncreatelu'])->middleware(['auth', 'verified'])->name('transactioncreatelu');
Route::post('/bank/transfer/lu/rate', [TransactionController::class, 'banktransferlurate'])->middleware(['auth', 'verified'])->name('banktransferlurate');
Route::post('/confirm/bank/transfer/connect/lu', [TransactionController::class, 'confirmbanktransferconnectlu'])->middleware(['auth', 'verified'])->name('confirmbanktransferconnectlu');

Route::post('add/foreign/user/rate', [RateController::class, 'addforeignuserrate'])->middleware(['auth', 'verified'])->name('addforeignuserrate');
Route::post('fu/trade/transaction', [TransactionController::class, 'futradetransaction'])->middleware(['auth', 'verified'])->name('futradetransaction');
Route::post('/update/fu/transaction/status/to/ongoing', [TransactionController::class, 'updatefutransactionstatustoongoing'])->middleware(['auth', 'verified'])->name('updatefutransactionstatus');
Route::post('/update/fu/transaction/status2', [TransactionController::class, 'updatefutransactionstatus2'])->middleware(['auth', 'verified'])->name('updatefutransactionstatus2');
Route::post('/upload/receipt/fu', [TransactionController::class, 'uploadreceiptfu'])->middleware(['auth', 'verified'])->name('uploadreceiptfu');

Route::post('/check/user/verification/status', [UserController::class, 'checkuserverificationstatus'])->middleware(['auth', 'verified'])->name('checkuserverificationstatus');
Route::post('/rate/user', [RatingController::class, 'rateuser'])->middleware(['auth', 'verified'])->name('rateuser');
Route::post('/upload/profile/pic', [UserController::class, 'uploadprofilepic'])->middleware(['auth', 'verified'])->name('uploadprofilepic');
Route::post('/lu/update/rate', [RateController::class, 'luupdaterate'])->middleware(['auth', 'verified'])->name('luupdaterate');
Route::post('/generate/dynamic/account/number', [TransactionController::class, 'generatedynamicaccountnumber'])->middleware(['auth', 'verified'])->name('generatedynamicaccountnumber');
Route::post('/user/review', [RatingController::class, 'userreview'])->middleware(['auth', 'verified'])->name('userreview');

require __DIR__.'/auth.php';
