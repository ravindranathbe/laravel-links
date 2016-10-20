@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Validate</div>

                <div class="panel-body">
@if(count($errors) > 0)
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php
    echo Form::open(['url' => 'form-validate', 'files' => 'true']);
    // csrf_field();
    // echo Form::token();
?>
<div class="form-group">
<?php
    echo Form::label('username', 'Username');
    echo Form::text('username', '', ['class' => 'form-control', 'id' => 'username']);
?>
</div>
<div class="form-group">
<?php
    echo Form::label('password', 'Password');
    echo Form::password('password', ['class' => 'form-control', 'id' => 'password']);
?>
</div>
<?php
    echo Form::submit('Submit', ['name' => 'frm-submit', 'class' => 'btn btn-default']);
    echo Form::close();
?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
