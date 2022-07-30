@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fund Your Wallet') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('new-transaction') }}" role="form">@CSRF

                            Amount to Deposit:
                            <input placeholder="5000" class="form-control @error('amount') is-invalid @enderror" type="text" name="amount" required>

                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <br/>
                            <button class="btn btn-danger btn-lg btn-block" type="submit" value="Pay Now!">

                                <i class="fa fa-plus-circle fa-lg"></i> Pay Now!</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
@endsection
