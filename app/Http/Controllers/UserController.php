<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user_list', compact('users'));
    }

    public function transactions(){
        $transactions = DB::table('transactions')->where('user_id', Auth::id())->get();
        return view('user_transactions', compact('transactions'));
    }

    public function transaction_history($id){
        $transactions = DB::table('transactions')->where('user_id', $id)->get();
        return view('transaction_history', compact('transactions'));
    }
}
