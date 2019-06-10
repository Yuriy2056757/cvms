@extends('layouts.cvms.master')

@section('title', 'Edit article')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit article</h2>
      </div>

      <form class="md-form" method="POST" action="{{ route('articles.update', $article) }}/"
        enctype="multipart/form-data">
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
        </div>

        <div class="md-form">
          <input class="form-control" type="text" name="slug" value="{{ $article->slug }}" required>

          <label for="slug">Slug</label>
        </div>

        <div class="md-form">
          <input class="form-control" type="text" name="seo_title" value="{{ $article->seo_title }}"
            maxlength="70" required>

          <label for="seo_title">Search engine title</label>
        </div>

        <div class="md-form mt-4">
          <input class="form-control" type="text" name="header_title" value="{{ $article->header_title }}" required>

          <label for="header_title">Header title</label>
        </div>

        <div class="md-form">
          <textarea name="seo_description" type="text" class="form-control md-textarea"
            rows="2" maxlength="150" required>{{ $article->seo_description }}</textarea>

          <label for="seo_description">Search engine description</label>
        </div>

        <div class="md-form">
          <textarea name="summary" type="text" class="form-control md-textarea"
            rows="6" required>{{ $article->summary }}</textarea>

          <label for="summary">Summary</label>
        </div>

        <div>
          @if ($article->image)
            <div class="pb-3">
              <img src="{{ asset('storage/' . $article->image) }}" alt="Image" class="rounded-circle img-fluid">
            </div>
          @endif

          <div class="pb-2">
            <input type="file" name="image">
          </div>
        </div>

        <div class="md-form">
          <input class="form-control" type="text" name="display_name" value="{{ $article->display_name }}" required>

          <label for="display_name">Display name</label>
        </div>

        <div class="md-form">
          <input class="form-control" type="text" name="display_subtitle" value="{{ $article->display_subtitle }}" required>

          <label for="display_subtitle">Display subtitle</label>
        </div>

        <div class="ml-4 custom-control custom-checkbox">
          <input name="is_active" type="checkbox" class="custom-control-input" id="is_active"
            {{ $article->is_active ? 'checked' : '' }}>
          <label class="custom-control-label disable-selection" for="is_active">Publish article</label>
        </div>

        <div class="ml-4 custom-control custom-checkbox">
          <input name="robots" type="checkbox" class="custom-control-input" id="robots"
            {{ $article->robots ? 'checked' : '' }}>
          <label class="custom-control-label disable-selection" for="robots">
            Allow search engine indexing
          </label>
        </div>

        <div class="mt-5">
          <button class="btn color-default btn-block" type="submit">
            UPDATE
          </button>
        </div>

        <div class="mt-1">
          <a href="{{ route('articles.show', $article) }}"
            class="btn btn-outline-danger waves-effect btn-block">CANCEL</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
