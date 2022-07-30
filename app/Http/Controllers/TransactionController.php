<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index(){

    }

    public function new_transaction(Request $request){
        $validated = $request->validate([
            'amount' => 'required|numeric|min:500|max:100000000000',
        ]);

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->amount = $request->amount;
        $transaction->transaction_ref = rand(1111111111,9999999999);
        $transaction->status = 'pending';
        $transaction->kobo = $request->amount * 100;
        $transaction->save();

        return view('confirm_proceed')->withTransaction($transaction);
    }

}
