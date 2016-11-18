@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    {{--<div class="panel-body">--}}
                    {{--<div class="col-md-6 col-md-offset-4">--}}
                    {{--<ul>--}}

                    {{--@foreach($users as $user)--}}

                    {{--<li>--}}
                    {{--<a href="{{route('users.show' , $user -> id)}}">--}}
                    {{--{{$user -> name}}--}}
                    {{--@if(($user -> is_admins))--}}
                    {{--{{'(Admin)'}}--}}
                    {{--@endif--}}
                    {{--</a>--}}
                    {{--</li>--}}

                    {{--@endforeach--}}

                    {{--</ul>--}}
                    {{--</div>--}}

                    <div class="panel-body">
                        <div class="col-md-15 col-md-offset-1">
                            <ul>
                                <style>th, td {
                                        padding: 5px;
                                    }
                                </style>
                                <table style="width:100%">

                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Is Admin?</th>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user -> id}}</td>
                                            <td contenteditable="true"><a href="{{route('users.show' , $user -> id)}}">
                                                    {{$user -> name}}
                                                </a>
                                            </td>
                                            <td>@if($user -> is_admin == 1)
                                                    {{'YES'}}
                                                @else
                                                    {{'NO'}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                            </ul>
                        </div>

                        <form method="post" action="/users/create">
                            <div class="col-md-6 col-md-offset-4">
                                {{csrf_field()}}

                                <input type="hidden" name="_method" value="GET">

                                <button type="link" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Create New User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection