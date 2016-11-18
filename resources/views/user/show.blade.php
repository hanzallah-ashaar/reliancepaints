@extends('layouts.app')



@section('content')


    <h1>
        <div class="col-md-6 col-md-offset-4">
            <a href="{{route('users.edit', $users -> id)}}">

                {{$users -> name}}

            </a>
        </div>
    </h1>

    <form class="form-horizontal" role="form" method="post" action="{{ route('users.destroy', $users->id) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="link" class="btn btn-danger">
                    <i class="fa fa-trash-o fa-fw"></i> Delete User
                </button>
            </div>
        </div>

    </form>


@endsection