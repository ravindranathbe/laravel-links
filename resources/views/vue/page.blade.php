@extends('layouts.vue')

@section('content')
<div class="col-md-2">

</div>
<div class="col-md-8">
  <h1 v-bind:title="message_title">@{{ message | toUpper }}</h1>
  <h2 v-once>@{{ message }}</h2>
  <h3 v-html="message"></h2>
  <transition name="fade">
    <p v-if="show_desc">@{{ desc }}</p>
  </transition>
  <ol>
    <li v-for="genre in genres">
      @{{ genre }}
    </li>
  </ol>
  <div class="form-group">
    <p>Count:: @{{ cnt }}</p>
    <input type="text" v-model="message" class="form-control" /><br />
    <button v-on:click="sayHello" class="btn btn-primary">Click me!</button>
    <button v-on:click="cntUp" class="btn btn-primary">Count Up!</button>
    <button v-on:click="cntDown" class="btn btn-primary">Count Down!</button>
  </div>
  <p>
    <demo-comp v-bind:hellotxt="message"></demo-comp>
  </p>
  <p>
    <demo-comp v-bind:hellotxt="message2"></demo-comp>
  </p>
</div>
<div class="col-md-2">

</div>
@endsection
