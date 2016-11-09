@extends('layouts.app2')

@section('content')
<div class="row">
  <div class="col-md-10">
    <h1 class="page-header">Group</h1>
  </div>
  <div class="col-md-2">
    <button type="button" class="btn btn-primary">Add Group</button>
  </div>
</div>

<h2 class="sub-header">Groups list</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($groups as $key => $group)
      <tr>
        <td>{{ $key + 1}}</td>
        <td>{{ $group->name }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
