@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fileup form</div>

                <div class="panel-body">
<?php
    echo Form::open(['url' => 'fileup', 'files' => 'true']);
    csrf_field();
    echo Form::file('file');
    echo '<br />';
    echo Form::submit('Submit', ['name' => 'frm-submit']);
    echo Form::close();
?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
