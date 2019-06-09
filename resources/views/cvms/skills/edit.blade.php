@extends('layouts.cvms.master')

@section('title', 'Edit skill')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit skill</h2>
      </div>

      <form class="md-form" method="POST" action="{{ route('articles.skills.update', [$article, $skill]) }}">
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
          <input class="form-control" type="text" name="title" value="{{ $skill->title }}" required>

          <label for="slug">Title</label>
        </div>

        <div class="md-form">
          <input name="percentage" type="number" min="0" max="100" class="form-control"
            value="{{ $skill->percentage }}" required>

          <label for="percentage">Percentage</label>
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
