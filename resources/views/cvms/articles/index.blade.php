@extends('layouts.cvms.master')

@section('title', 'Articles')
@section('header_title', 'Articles')

@section('header_buttons')
<a href="{{ route('articles.create') }}" class="btn color-default m-0">CREATE NEW</a>
@endsection

@section('content')
<div class="table-responsive text-nowrap">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
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

        <td class="text-right">
          <a class="btn btn-sm color-default pr-3 pl-3 m-0" href="/cvms/articles/{{ $article->id }}/edit">
            <i class="fa fa-pencil"></i>
          </a>

          <form class="d-inline" onsubmit="return confirm('Delete item?');" method="POST" action="/cvms/articles/{{ $article->id }}">
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
@endsection
