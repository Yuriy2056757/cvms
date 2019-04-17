@extends('layouts.cvms.master')

@section('title', 'Create Article')
@section('header_title', 'Create Article')

@section('content')
<form class="md-form" method="POST" action="/articles">
  @csrf

  <div>
    <input class="form-control" type="text" name="title" placeholder="Article name">
  </div>

  <div>
    <button class="btn color-default btn-block my-4" type="submit">
      SUBMIT
    </button>
  </div>
</form>
@endsection
