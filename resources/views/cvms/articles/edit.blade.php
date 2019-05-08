@extends('layouts.cvms.master')

@section('title', 'Edit article')

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit article</h2>
      </div>

      <form class="md-form" method="POST" action="/cvms/articles/{{ $article->slug }}/">
        @method('PATCH')
        @csrf

        @if ($errors->any())
          <div class="alert alert-danger pb-0">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="md-form">
          <input class="form-control" type="text" name="name" value="{{ $article->name }}" required>

          <label for="name">Name</label>
        </div class="md-form">

        <div class="md-form">
          <input class="form-control" type="text" name="slug" value="{{ $article->slug }}" required>

          <label for="slug">Slug</label>
        </div class="md-form">

        <div class="md-form">
          <input class="form-control" type="text" name="seo_title" value="{{ $article->seo_title }}" required>

          <label for="seo_title">Search engine title</label>
        </div class="md-form">

        <div class="md-form mt-4">
          <input class="form-control" type="text" name="header_title" value="{{ $article->header_title }}" required>

          <label for="header_title">Header title</label>
        </div class="md-form">

        <div class="md-form">
          <textarea name="seo_description" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="2" required>{{ $article->seo_description }}</textarea>

          <label for="seo_description">Search engine description</label>
        </div class="md-form">

        <div class="md-form">
          <textarea name="summary" type="text" id="materialContactFormMessage" class="form-control md-textarea" rows="6" required>{{ $article->summary }}</textarea>

          <label for="summary">Summary</label>
        </div class="md-form">

        <div class="ml-4 custom-control custom-checkbox">
        <input name="is_active" type="checkbox" class="custom-control-input" id="defaultUnchecked" {{ $article->is_active ? 'checked' : '' }}>
          <label class="custom-control-label disable-selection" for="defaultUnchecked">Publish article</label>
        </div>

        <div class="mt-5">
          <button class="btn color-default btn-block" type="submit">
            UPDATE
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
