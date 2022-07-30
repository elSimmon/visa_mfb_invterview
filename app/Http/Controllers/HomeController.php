<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wallet = DB::table('wallets')->where('user_id', Auth::id())->first();
        if ($wallet ==null ) {
            $wallet = new Wallet();
            $wallet->user_id = Auth::id();
            $wallet->balance = 0;
            $wallet->save();
        }
        return view('home');
    }
}
