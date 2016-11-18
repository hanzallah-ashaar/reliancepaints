@extends('layouts.app')


@section('content')


    <div class="col-md-6 col-md-offset-4">
        <h1>{{$user -> name}}</h1>
        {{--<h2>{{$user -> page -> id()}}</h2>--}}
    </div>
    <form class="form-horizontal" role="form" method="GET" action="{{ route('rights.edit', $user -> id)}}">

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="link" class="btn btn-primary">
                    <i class="fa fa-btn fa-edit"></i> Edit Access
                </button>
            </div>
        </div>

    </form>


    <form class="form-horizontal" role="form" method="post" action="{{ route('rights.destroy', $user->id) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="link" class="btn btn-danger">
                    <i class="fa fa-trash-o fa-fw"></i> Delete Access
                </button>
            </div>
        </div>

    </form>



@endsection