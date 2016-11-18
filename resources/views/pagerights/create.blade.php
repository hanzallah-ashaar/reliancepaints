@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a new Right</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/rights') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="user_id" class="col-md-4 control-label">User ID</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="number" class="form-control" name="user_id" value="{{ old('user_id') }}">

                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('page_id') ? ' has-error' : '' }}">
                                <label for="page_id" class="col-md-4 control-label">Page ID</label>

                                <div class="col-md-6">
                                    <input id="page_id" type="number" class="form-control" name="page_id" value="{{ old('page_id') }}">

                                    @if ($errors->has('page_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('page_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Create an Access Right
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
