@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>User Rights</b></div>

                    <div class="panel-body">
                        <div class="col-md-15 col-md-offset-1">
                            <ul>
                                <style>th, td {
                                        padding: 5px;
                                    }
                                </style>
                                <table style="width:100%">

                                    <tr>
                                        <th>User ID</th>
                                        <th>Page ID</th>
                                        <th>Page URL</th>
                                        <th>User Name</th>
                                    </tr>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user -> id}}</td>
                                            <td>
                                                @foreach($user->page as $page)
                                                    {{$page -> id . ','}}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($user->page as $page)

                                                    <a href="{{route('rights.edit' , $page -> id)}}">
                                                        {{$page -> name . ' ,'}}
                                                    </a>

                                                @endforeach
                                            </td>
                                            <td>{{$user -> name}}</td>
                                            <td><a class="btn btn-primary btn-sm" href="{{route('rights.show', $user->id)}}">Edit</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </ul>
                        </div>


                        <form method="post" action="/rights/create">
                            <div class="col-md-6 col-md-offset-4">
                                {{csrf_field()}}

                                <input type="hidden" name="_method" value="GET">

                                <button type="link" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Create New Rights
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection