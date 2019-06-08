@extends('layouts.cvms.master')

@section('title', 'Edit qualification')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit qualification</h2>
      </div>

      <form class="md-form" method="POST" action="{{ route('articles.qualifications.update', [$article, $qualification]) }}">
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
          <input class="form-control" type="text" name="title" value="{{ $qualification->title }}" required>

          <label for="slug">Title</label>
        </div>

        <div class="md-form">
          <textarea name="description" type="text" id="materialContactFormMessage" class="form-control md-textarea"
            rows="6" required>{{ $qualification->description }}</textarea>

          <label for="description">Description</label>
        </div>

        <div>
          <div>
            Date start
          </div>

          <input type="date" name="date_start" value="{{ date('Y-m-d', strtotime($qualification->date_start)) }}" required>
        </div>

        <div class="mt-3">
          <div>
            Date end
          </div>

          <input type="date" name="date_end" value="{{ date('Y-m-d', strtotime($qualification->date_end)) }}" required>
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
