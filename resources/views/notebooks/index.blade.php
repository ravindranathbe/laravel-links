@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notebooks list</div>

                <div class="panel-body">
                    @foreach ($notebooks as $notebook)
                    <div class="col-md-6" style="border: 1px solid #000000;">
                        <p>{{ $notebook->name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
