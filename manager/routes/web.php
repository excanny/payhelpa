<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users', [UserController::class, 'user'])->middleware(['auth'])->name('users');
Route::get('/user_details/{id}', [UserController::class, 'user_details'])->middleware(['auth'])->name('user_details');


Route::get('/update_status/{id}', 'App\Http\Controllers\UserController@update_status')->name('update_status');

Route::get('/transactions', [UserController::class, 'transactions'])->middleware(['auth'])->name('transactions');

Route::get('/verify', [UserController::class, 'verify'])->middleware(['auth'])->name('verify');

Route::get('/status', [UserController::class, 'status'])->middleware(['auth'])->name('status');

Route::get('/successinfo/{transaction_id}', [UserController::class, 'successinfo'])->middleware(['auth'])->name('successinfo');

Route::get('/localUsersStatus', [UserController::class, 'localUsersStatus'])->middleware(['auth'])->name('localUsersStatus');

Route::get('/foreignUsersStatus', [UserController::class, 'foreignUsersStatus'])->middleware(['auth'])->name('foreignUsersStatus');

Route::get('/selectuser', [UserController::class, 'selectuser'])->middleware(['auth'])->name('selectuser');


Route::get('/statusdeclined', [UserController::class, 'statusdeclined'])->middleware(['auth'])->name('statusdeclined');

Route::get('/pendinginfo/{transaction_id}', [UserController::class, 'pendinginfo'])->middleware(['auth'])->name('pendinginfo');

Route::get('/ongoingstatus', [UserController::class, 'ongoingstatus'])->middleware(['auth'])->name('ongoingstatus');

Route::get('/show/{id}', [UserController::class, 'show'])->middleware(['auth'])->name('show');

Route::get('/showimage/{id}', [UserController::class, 'showimage'])->middleware(['auth'])->name('showimage');

Route::get('/message/{user_id}', [UserController::class, 'message'])->middleware(['auth'])->name('message');

Route::post('/messagesend', [UserController::class, 'messagesend'])->middleware(['auth'])->name('messagesend');



Route::get('/update_verify/{id}', 'App\Http\Controllers\UserController@update_verify')->name('update_verify');


require __DIR__.'/auth.php';
