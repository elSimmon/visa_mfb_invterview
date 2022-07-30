@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Transactions: ') }}
                        {{$transactions->count()}}
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-responsive table-striped table-borderless">
                            <thead>
                            <th>ID</th>
                            <th>REFERENCE</th>
                            <th>AMOUNT</th>
                            <th>STATUS</th>
                            </thead>

                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->transaction_ref}}</td>
                                    <td>{{number_format($transaction->amount, 2)}}</td>
                                    <td>
                                        @if($transaction->status=='pending')
                                            <span class="badge bg-warning">
                                                    {{$transaction->status}}
                                                </span>
                                        @else
                                            <span class="badge bg-success">
                                                    {{$transaction->status}}
                                                </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('home')}}">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
