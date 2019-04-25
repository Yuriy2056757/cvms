@extends('layouts.cvms.master')

@section('title', $article->name)

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-md-flex justify-content-between">
        <h2 class="page-section-header text-justify">{{ $article->header_title }}</h2>

        @if (Auth::user()->is_admin)
          <a href="/cvms/articles/{{ $article->slug }}/edit">EDIT</a>
        @endif
      </div>

      <p>
        {{ $article->summary }}
      </p>
    </div>
  </div>
</div>
@endsection