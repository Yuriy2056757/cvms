@extends('layouts.cvms.master')

@section('title', 'Create article')

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Create article</h2>
      </div>

      <form class="md-form" method="POST" action="/cvms/articles">
        @csrf

        <div class="md-form">
          <input class="form-control" type="text" name="name" required>

          <label for="name">Name</label>
        </div class="md-form">

        <div class="md-form">
          <input class="form-control" type="text" name="slug" required>

          <label for="slug">Slug</label>
        </div class="md-form">

        <div class="md-form">
          <input class="form-control" type="text" name="seo_title" required>

          <label for="seo_title">Search engine title</label>
        </div class="md-form">

        <div class="md-form">
          <textarea name="seo_description" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="2" required></textarea>

          <label for="seo_description">Search engine description</label>
        </div class="md-form">

        <div class="md-form mt-4">
          <input class="form-control" type="text" name="header_title" required>

          <label for="header_title">Header title</label>
        </div class="md-form">

        <div class="md-form">
          <textarea name="summary" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="6" required></textarea>

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
    </div>
  </div>
</div>
@endsection
