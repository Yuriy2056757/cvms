@extends('layouts.cvms.master')

@section('title', ucfirst(Route::getCurrentRoute()->getName()))
@section('header_title', ucfirst(Route::getCurrentRoute()->getName()))

@section('content')
<p>You are logged in!</p>
@endsection
