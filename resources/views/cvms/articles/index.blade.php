@extends('layouts.cvms.master')

@section('title', 'Articles')
@section('header_title', 'Articles')

@section('header_buttons')

<a href="{{ route('articles.create') }}" class="btn color-default m-0">CREATE NEW</a>

@endsection

@section('content')

<ol>
  @foreach ($articles as $article)
    <li>{{ $article->article_name }}</li>
  @endforeach
</ol>

@endsection
