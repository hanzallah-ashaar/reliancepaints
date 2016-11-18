@extends('layouts.app')


@section('content')


    <div class="col-md-6 col-md-offset-4">
        <h1>{{$page -> name}}</h1>
    </div>
    <form class="form-horizontal" role="form" method="GET" action="{{ route('page.edit', $page -> id)}}">

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-edit"></i> Edit Page
                </button>
            </div>
        </div>

    </form>

    <form class="form-horizontal" role="form" method="post" action="{{ route('page.destroy', $page->id) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="link" class="btn btn-danger">
                    <i class="fa fa-trash-o fa-fw"></i> Delete Page
                </button>
            </div>
        </div>

    </form>



@endsection