@extends('layouts.cvms.master')

@section('title', 'Articles')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 p-0">
            <h2 class="page-section-header text-justify">Articles</h2>
          </div>

          <div class="col-sm-4">
            <div class="row flex-row-reverse">
              <a href="{{ route('articles.create') }}" class="btn amy-crisp-gradient m-0 d-inline-block">CREATE NEW</a>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NAME</th>
              <th scope="col">SLUG</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($articles as $article)
            <tr>
              <td>
                <p>{{ $article->id }}</p>
              </td>

              <td>
                <p>{{ $article->name }}</p>
              </td>

              <td>
                <p>{{ $article->slug }}</p>
              </td>

              <td class="text-right">
                @if ($article->is_active)
                  <a class="btn btn-sm color-default pr-3 pl-3 m-0" href="/cv/{{ $article->slug }}">
                    <i class="fa fa-globe"></i>
                  </a>
                @endif

                <a class="btn btn-sm color-default pr-3 pl-3 m-0" href="/cvms/articles/{{ $article->slug }}">
                  <i class="fa fa-pencil"></i>
                </a>

                <form class="d-inline" onsubmit="return confirm('Delete item?');" method="POST" action="/cvms/articles/{{ $article->slug }}">
                  @method('DELETE')
                  @csrf

                  <button type="submit" class="btn btn-sm color-danger pr-3 pl-3 m-0">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
