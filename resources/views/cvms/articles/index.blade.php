@extends('layouts.cvms.master')

@section('title', 'Articles')

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Articles</h2>

        <div>
          <a href="{{ route('articles.create') }}" class="btn color-default m-0 d-inline-block">CREATE NEW</a>
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
                <a class="btn btn-sm color-default pr-3 pl-3 m-0" href="/cv/{{ $article->slug }}">
                  <i class="fa fa-eye"></i>
                </a>

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
