<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserControllerAPI;
use App\Http\Controllers\TransactionControllerAPI;
use App\Http\Controllers\KYCControllerAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('settlement_notif', [WalletController::class, 'settlementnotification']);

Route::post('register', [UserControllerAPI::class, 'register']);

Route::post('login', [UserControllerAPI::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('/transaction/{transaction_id}/details', [TransactionControllerAPI::class, 'transactiondetails']);
    Route::post('/bank/transfer/lu/input/rate', [TransactionControllerAPI::class, 'banktransferlurate']);
    Route::post('/bank/transfer/lu/connect', [TransactionControllerAPI::class, 'confirmbanktransferconnectlu']);
    Route::post('/add/update/foreign/user/rate', [TransactionControllerAPI::class, 'addiupdateforeignuserrate']);
    Route::post('update/lu/rate', [TransactionControllerAPI::class, 'updatelurate']);
    Route::post('/fu/trade', [TransactionControllerAPI::class, 'futradetransaction']);
    Route::post('/update/transaction/status/to/ongoing', [TransactionControllerAPI::class, 'updatetransactionstatustoongoing']);
    Route::post('/update/transaction/status/to/completed', [TransactionControllerAPI::class, 'updatetransactionstatustocompleted']);
    Route::post('/upload/transaction/completed/receipt', [TransactionControllerAPI::class, 'uploadtransactioncompletedreceipt']);
    Route::post('/getusertransactions', [TransactionControllerAPI::class, 'getusertransactions']);
    Route::get('/getuserdetails', [UserControllerAPI::class, 'getuserdetails']);
    
    Route::post('/verify/phone/local', [KYCControllerAPI::class, 'verifyphonelocal']);
    Route::post('/verify/phone/foreign', [KYCControllerAPI::class, 'verifyphoneforeign']);
    Route::post('/verify/phone/otp', [KYCControllerAPI::class, 'verifyphoneotp']);
    // Route::post('/resendotp', [KYCControllerAPI::class, 'resendotp']);
    // Route::get('/loadotpwithdraw', [KYCControllerAPI::class, 'loadotpwithdraw']);
    Route::post('/uploadkyc/local', [KYCControllerAPI::class, 'uploadkyclocal']);
    Route::post('/uploadkyc/foreign', [KYCControllerAPI::class, 'uploadkycforeign']);
    //Route::post('/dashboard/kyc/updatekyc', [KYCControllerAPI::class, 'updatekycaction']);
});
