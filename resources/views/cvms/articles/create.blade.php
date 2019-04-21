@extends('layouts.cvms.master')

@section('title', 'Create article')
@section('header_title', 'Create article')

@section('content')
<form class="md-form" method="POST" action="/cvms/articles">
  @csrf

  <div class="md-form">
    <input class="form-control" type="text" name="name">

    <label for="name">Name</label>
  </div class="md-form">

  <div class="md-form">
    <input class="form-control" type="text" name="slug">

    <label for="slug">Slug</label>
  </div class="md-form">

  <div class="md-form">
    <input class="form-control" type="text" name="seo_title">

    <label for="seo_title">Search engine title</label>
  </div class="md-form">

  <div class="md-form">
    <textarea name="seo_description" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="2"></textarea>

    <label for="seo_description">Search engine description</label>
  </div class="md-form">

  <div class="md-form mt-4">
    <input class="form-control" type="text" name="header_title">

    <label for="header_title">Header title</label>
  </div class="md-form">

  <div class="md-form">
    <textarea name="summary" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="7"></textarea>

    <label for="summary">Summary</label>
  </div class="md-form">

  <div class="mt-5">
    <button class="btn color-default btn-block" type="submit">
      CREATE
    </button>
  </div>

  <div class="mt-1">
    <a href="{{ route('articles.index') }}" class="btn btn-outline-danger waves-effect btn-block">CANCEL</a>
  </div>
</form>
@endsection
