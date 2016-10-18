@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form</div>

                <div class="panel-body">
<?php
    echo Form::open(['url' => 'form']);
    echo Form::text('username', 'Username');
    echo '<br />';
    echo Form::text('email', 'Email');
    echo '<br />';
    echo Form::submit('Submit');
    echo Form::close();
?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
