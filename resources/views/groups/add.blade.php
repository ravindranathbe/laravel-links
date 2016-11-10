@extends('layouts.app2')

@section('content')
<div class="row">
  <div class="col-md-10">
    <h1 class="page-header">Group</h1>
  </div>
  <div class="col-md-2">
    <a href="{{ url('group') }}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</button></a>
  </div>
</div>

<h2 class="sub-header">Group Add</h2>
<div class="row">
  <div class="col-md-6">
{!! Form::open(['url' => 'group/add']) !!}
<?php echo Form::hidden('_method', 'POST'); ?>
  <div class="form-group">
    {{ Form::label('groupName', 'Name') }}
    {{ Form::text('name', old('name'), ['id' => 'groupName', 'class' => 'form-control']) }}
  </div>
  <button type="submit" class="btn btn-default">Save</button>
{!! Form::close() !!}
  </div>
</div>
@endsection
