<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Unicodeveloper\Paystack\Facades\Paystack;
use RealRashid\SweetAlert\Facades\Alert;

class WalletController extends Controller
{
    public function index(){

    }

    public function fund_wallet(){
        //if wallet does not exist, create a wallet account and display form to fund it
        $wallet = DB::table('wallets')->where('user_id', Auth::id())->first();
        if ($wallet ==null ) {
            $wallet = new Wallet();
            $wallet->user_id = Auth::id();
            $wallet->balance = 0;
            $wallet->save();
        }
            return view('fund_wallet');
    }

    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
//        dd($paymentDetails);

        $result = $paymentDetails;

        if($result['status'] === true){
            $amount = $result['data']['amount'] / 100;
            $transaction_ref = $result['data']['reference'];

            DB::table('transactions')
                ->where('transaction_ref', $transaction_ref)
                ->update(['status' => 'success']);

            DB::table('wallets')->where('user_id', Auth::id())->increment('balance', $amount);

            toast('Wallet Funded Successfully', 'success');
            return redirect()->route('home');
        }
    }

}
