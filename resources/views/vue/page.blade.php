@extends('layouts.vue')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-9">
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
  <button v-on:click="sayHello">Click me!</button>
  <p>
    <input type="text" v-model="message"  />
  </p>
  <p>
    <demo-comp v-bind:hellotxt="message"></demo-comp>
  </p>
  <p>
    <demo-comp v-bind:hellotxt="message2"></demo-comp>
  </p>
</div>
@endsection
