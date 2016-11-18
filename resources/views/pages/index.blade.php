@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Pages</div>

                    {{--<div class="panel-body">--}}
                    {{--<div class="col-md-6 col-md-offset-4">--}}
                    {{--<ul>--}}

                    {{--@foreach($pages as $page)--}}

                    {{--<li>--}}
                    {{--<a href="{{route('page.show' , $page -> id)}}">--}}
                    {{--{{$page -> name}}--}}
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
                                        <th>Page ID</th>
                                        <th>Page Name</th>
                                    </tr>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{$page -> id}}</td>
                                            <td>{{$page -> page_id}}</td>
                                            <td contenteditable="true"><a href="{{route('page.show' , $page -> id)}}">
                                                    {{$page -> name}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                            </ul>
                        </div>

                        <form method="post" action="/page/create">
                            <div class="col-md-6 col-md-offset-4">
                                {{csrf_field()}}

                                <input type="hidden" name="_method" value="GET">

                                <button type="link" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i> Create New Page
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection