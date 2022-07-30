@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('All Users') }}
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-borderless table-striped table-condensed">
                            <thead>
                            <th>EMAIL</th>
                            <th>NAME</th>
                            <th>ROLE</th>
                            <th>TRANSACTIONS</th>
                            <th>&nbsp;</th>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if($user->admin === 0)
                                            <span class="badge bg-dark">
                                                {{__('User')}}
                                            </span>
                                        @else
                                            <span class="badge bg-success">
                                                {{__('Admin')}}
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{number_format($user->transactions()->count())}}
                                    </td>
                                    <td>
                                        @if($user->transactions()->count() > 0)
                                            <a href="{{route('transaction-history',[$user->id])}}">
                                                <button class="btn btn-sm btn-danger">View history</button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
