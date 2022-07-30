@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Wallet Dashboard') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-danger text-center">Wallet Balance: <span
                            style="text-decoration: line-through;">N</span>{{number_format(Auth::user()->wallet->balance, 2)}}
                    </h1>
                        <br/>
                        <div style="text-align: center;">
                            <a href="{{route('fund-wallet')}}">
                                <button class="btn btn-danger btn-lg text-light">Fund Wallet</button>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
