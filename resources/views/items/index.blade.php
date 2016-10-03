@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Items list</div>

                <div class="panel-body">
@if(Session::has('rating_status'))
<div class="alert alert-success" role="alert">{{ Session::get('rating_status') }}</div>
@endif
@if(Session::has('rating_status_fail'))
<div class="alert alert-danger" role="alert">{{ Session::get('rating_status_fail') }}</div>
@endif
                    @foreach ($items as $item) 
                    <div class="col-md-6" style="border: 1px solid #000000;">
                        <p>{{ $item->name }}</p>
                        <p>
<span class="label label-primary">Rate: </span>
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"> 
    <div class="btn-group" role="group" aria-label="First group">   
        <button type="button" class="btn btn-default" onclick="javascript: window.location='{{ url('items/rate', [$item->id, 1]) }}'">1</button>
        <button type="button" class="btn btn-default" onclick="javascript: window.location='{{ url('items/rate', [$item->id, 2]) }}'">2</button>
        <button type="button" class="btn btn-default" onclick="javascript: window.location='{{ url('items/rate', [$item->id, 3]) }}'">3</button>
        <button type="button" class="btn btn-default" onclick="javascript: window.location='{{ url('items/rate', [$item->id, 4]) }}'">4</button>
        <button type="button" class="btn btn-default" onclick="javascript: window.location='{{ url('items/rate', [$item->id, 5]) }}'">5</button>
    </div>
</div>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
