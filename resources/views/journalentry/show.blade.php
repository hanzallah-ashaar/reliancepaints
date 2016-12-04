@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-0.5">
                <div class="panel panel-default">
                    <div class="panel-heading">Journal Entries</div>
                    <div class="panel-body">

                    <div class="col-md-15 col-md-offset-1">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Reference</th>
                                <th>Date</th>
                                <th>Partner</th>

                            </tr>

                            @foreach($j_entry as $je)
                                <tr>
                                    <td>{{$je -> id}}</td>

                                    <td>{{$je -> reference}}</td>

                                    <td>{{$je -> date}}</td>

                                    <td>{{$je -> partner}}</td>
                                </tr>
                            @endforeach


                        </table>
                    </div>

                            <form method="post" action="/journalentry/create">
                                <div class="col-md-6 col-md-offset-4">
                                    {{csrf_field()}}

                                    <input type="hidden" name="_method" value="GET">

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-pencil"></i> Create New Journal Voucher
                                    </button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
