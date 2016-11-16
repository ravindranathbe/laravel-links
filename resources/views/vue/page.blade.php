@extends('layouts.vue')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  <h1>FAQ</h1>
  <!--ol>
    <li v-for="question in questions">
      <p class="faq_question"><a href="#">@{{ question }}</a></p>
      <p class="faq_answer">@{{ answers[1] }}</p>
    </li>
  </ol-->
  <div class="form-group">
    <label for="question">Question</label>
    <select class="form-control faq_question" id="question" v-model="selQuestion" v-on:change="handleFaqChange">
      <option>Select question</option>
      <option v-for="faq in faqs" v-bind:value="faq.id">@{{ faq.question }}</option>
    </select>
    <p>Selected question ID: @{{ selQuestion }}.</p>
  </div>
  <div class="form-group faq_answer">
    <p>@{{ selAnswer }}</p>
  </div>
</div>
<!--div class="col-md-6">
  <h1 v-bind:title="message_title">@{{ message | toUpper }}</h1>
  <p>Text upper by computed:: @{{ c_txtUpper }}</p>
  <p>Text upper by method:: @{{ m_txtUpper() }}</p>
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
</div-->
<div class="col-md-3">

</div>
@endsection
