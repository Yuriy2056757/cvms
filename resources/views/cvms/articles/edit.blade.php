@extends('layouts.cvms.master')

@section('title', 'Edit article')
@section('header_title', 'Edit article')

@section('content')
<form class="md-form" method="POST" action="/cvms/articles/{{ $article->id }}/">
  @method('PATCH')
  @csrf

  <div class="md-form">
    <input class="form-control" type="text" name="name" value="{{ $article->name }}">

    <label for="name">Name</label>
  </div class="md-form">

  <div class="md-form">
    <input class="form-control" type="text" name="slug" value="{{ $article->slug }}">

    <label for="slug">Slug</label>
  </div class="md-form">

  <div class="md-form">
    <input class="form-control" type="text" name="seo_title" value="{{ $article->seo_title }}">

    <label for="seo_title">Search engine title</label>
  </div class="md-form">

  <div class="md-form">
    <textarea name="seo_description" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="2">{{ $article->seo_description }}</textarea>

    <label for="seo_description">Search engine description</label>
  </div class="md-form">

  <div class="md-form mt-4">
    <input class="form-control" type="text" name="header_title" value="{{ $article->header_title }}">

    <label for="header_title">Header title</label>
  </div class="md-form">

  <div class="md-form">
    <textarea name="summary" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="7">{{ $article->summary }}</textarea>

    <label for="summary">Summary</label>
  </div class="md-form">

  <div class="mt-5">
    <button class="btn color-default btn-block" type="submit">
      CHANGE
    </button>
  </div>

  <div class="mt-2">
    <a href="{{ route('articles.index') }}" class="btn btn-outline-danger waves-effect btn-block">CANCEL</a>
  </div>
</form>
@endsection
