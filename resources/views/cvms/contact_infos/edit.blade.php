@extends('layouts.cvms.master')

@section('title', 'Edit contact info')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit contact info</h2>
      </div>

      <form class="md-form" method="POST" action="{{ route('articles.contact_infos.update', [$article, $contactInfo]) }}">
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
          <input class="form-control" type="text" name="title" value="{{ $contactInfo->title }}" required>

          <label for="slug">Title</label>
        </div>

        <div class="md-form">
          <textarea name="description" type="text" id="materialContactFormMessage" class="form-control md-textarea"
            rows="6" required>{{ $contactInfo->description }}</textarea>

          <label for="description">Description</label>
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
