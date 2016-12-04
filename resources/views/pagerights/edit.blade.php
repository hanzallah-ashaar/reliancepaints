@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Access</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/rights') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="GET">
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}

                            <div class="form-group{{ $errors->has('old_page_id') ? ' has-error' : '' }}">
                                <label for="old_page_id" class="col-md-4 control-label">Old Page ID</label>

                                <div class="col-md-6">
                                    <input id="old_page_id" type="number" class="form-control" name="old_page_id" value="">

                                    @if ($errors->has('old_page_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('old_page_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new_page_id') ? ' has-error' : '' }}">
                                <label for="new_page_id" class="col-md-4 control-label">New Page ID</label>

                                <div class="col-md-6">
                                    <input id="new_page_id" type="number" class="form-control" name="new_page_id" value="">

                                    @if ($errors->has('new_page_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new_page_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-edit"></i> Edit Rights
                                    </button>
                                </div>
                            </div>

                            {{--<form class="form-horizontal" role="form" method="post" action="{{ route('rights.destroy', $user->id) }}">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="col-md-6 col-md-offset-4">--}}
                                        {{--<button type="link" class="btn btn-danger">--}}
                                            {{--<i class="fa fa-trash-o fa-fw"></i> Delete Access--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</form>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection