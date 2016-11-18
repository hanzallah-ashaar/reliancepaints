@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in! {{$user -> name}} <br>
                        {{--You can visit the following pages:--}}
                        {{--<style>th, td {--}}
                                {{--padding: 5px;--}}
                            {{--}--}}
                        {{--</style>--}}
                        {{--<table style="width:100%">--}}
                        {{--<table>--}}
                            {{--<tr>--}}
                                {{--<th>Page ID</th>--}}
                                {{--<th>Page URL</th>--}}
                            {{--</tr>--}}
                            {{--<tbody>--}}
                            {{--@foreach($pages as $page)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ '    '. $page -> id . '    '}}</td>--}}
                                    {{--<td>--}}
                                        {{--@foreach($user->page as $page)--}}
                                            {{--{{$page -> id . ','}}--}}
                                        {{--@endforeach--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                            {{--{{'    ' . $page -> name . '    '}}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
