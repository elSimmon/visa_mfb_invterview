@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('You will be redirected...') }}</div>
                    <div class="card-body">
                        <h3 class="text-center text-danger">You are about to deposit {{number_format($transaction->amount, 2)}} in your wallet
                        </h3>
                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" role="form">

                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['transaction_ref' => $transaction->transaction_id]) }}" >

                            <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}

                            <input type="hidden" name="user_id" value="{{$transaction->id}}">

                            <input type="hidden" name="amount" value="{{$transaction->kobo}}"> {{-- required in kobo --}}

                            <input type="hidden" name="currency" value="NGN">

                            <input type="hidden" name="reference" value="{{ $transaction->transaction_ref }}">

                            {{ csrf_field() }}

                            <br/>
                            <div style="text-align: center;">
                                <button class="btn btn-danger btn-lg btn-block" type="submit" value="Pay Now!">
                                    Confirm and Proceed
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
@endsection
