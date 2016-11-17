@extends('layouts.timeline')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  <div class="row">
    <h1>Dynamic timeline</h1>
  </div>

  <div class="row">
    <h2>Comment box</h2>
    {!! Form::open(['url' => 'timeline']) !!}
    <div class="form-group">
      {!! Form::textarea('comment', '', ['id' => 'comment', 'class' => 'form-control', 'rows' => 5, 'cols' => 100]) !!}
      @if ($errors->first('comment'))
      <p class="text-danger">{{ $errors->first('comment') }}</p>
      @endif

    </div>
    <div class="form-group">
      {!! Form::label('author', 'Author') !!}
      {!! Form::text('author', '', ['id' => 'author', 'class' => 'form-control']) !!}
      @if ($errors->first('author'))
      <p class="text-danger">{{ $errors->first('author') }}</p>
      @endif
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <hr />
  </div>

  <div class="row">
    <ul>
    @foreach($timelines as $timeline)
      <li>
        <p class="bg-info">{{ $timeline['comment'] }}</p>
        <p class="text-right text-info">by <i>{{ $timeline['author'] }}</i></p>
      </li>
    @endforeach
    </ul>
  </div>
</div>
<div class="col-md-3">

</div>
@endsection
