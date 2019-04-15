@extends('layouts.cvms.master')

@section('title', 'Articles')
@section('header_title', 'Articles')

@section('content')

<ol>
  @foreach ($articles as $article)
    <li>{{ $article->article_name }}</li>
  @endforeach
</ol>

@endsection
