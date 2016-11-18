@extends('layouts.app')


@section('content')


    <div class="col-md-6 col-md-offset-4">
        <h1>{{$account -> name}}</h1>
    </div>
    <form class="form-horizontal" role="form" method="GET" action="{{ route('chart_accounts.edit', $account -> id)}}">

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="link" class="btn btn-primary">
                    <i class="fa fa-btn fa-edit"></i> Edit Account
                </button>
            </div>
        </div>

    </form>


    <form class="form-horizontal" role="form" method="post" action="{{ route('chart_accounts.destroy', $account->id) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="link" class="btn btn-danger">
                    <i class="fa fa-trash-o fa-fw"></i> Delete Account
                </button>
            </div>
        </div>

    </form>



@endsection