@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Chart Of Accounts</b></div>

                    <div class="panel-body">
                        <div class="col-md-15 col-md-offset-1">
                            <ul>
                                <style>th, td {
                                        padding: 5px;
                                    }
                                </style>
                                <table style="width:100%">

                                    <tr>
                                        <th>Code</th>
                                        <th>Account</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>{{$account -> code}}</td>
                                            <td contenteditable="false"><a href="{{route('chart_accounts.show' , $account -> id)}}">
                                                    {{$account -> name}}
                                                </a>
                                            </td>
                                            <td>{{$account -> type}}</td>
                                            <td>{{$account -> total_amount}}</td>
                                        </tr>
                                    @endforeach
                                </table>

                            </ul>
                        </div>


                        <form method="post" action="/chart_accounts/create">
                            <div class="col-md-6 col-md-offset-4">
                                {{csrf_field()}}

                                <input type="hidden" name="_method" value="GET">

                                <button type="link" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Create New Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection