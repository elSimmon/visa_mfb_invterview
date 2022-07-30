<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//display form to fund wallet
Route::get('/fund-wallet', [App\Http\Controllers\WalletController::class, 'fund_wallet'])->name('fund-wallet');

//create new transaction and redirect to confirmation page
Route::post('/new-transaction', [App\Http\Controllers\TransactionController::class, 'new_transaction'])->name('new-transaction');

//display transaction confirmation page
Route::get('/confirm-transaction', [App\Http\Controllers\WalletController::class, 'index'])->name('confirm-transaction');

//redirect to payment gateway
Route::post('/pay', [App\Http\Controllers\WalletController::class, 'redirectToGateway'])->name('pay');

//receive payment details from payment gateway
Route::get('/payment/callback', [App\Http\Controllers\WalletController::class, 'handleGatewayCallback'])->name('payment');

//list all users
Route::get('/all-users', [App\Http\Controllers\UserController::class, 'index'])->name('all-users');

//list individual user transactions
Route::get('/my-transactions', [App\Http\Controllers\UserController::class, 'transactions'])->name('my-transactions');

//list transactions of selected user
Route::get('/transaction-history/{id}', [App\Http\Controllers\UserController::class, 'transaction_history'])->name('transaction-history');

