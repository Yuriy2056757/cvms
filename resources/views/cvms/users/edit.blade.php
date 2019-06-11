@extends('layouts.cvms.master')

@section('title', 'Edit profile info')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit profile</h2>
      </div>

      <form class="md-form" method="POST" action="{{ route('users.update', $user) }}">
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
          <input class="form-control" type="text" name="name" value="{{ $user->name }}" required>

          <label for="name">Naam</label>
        </div class="md-form">

        <div class="md-form">
          <input class="form-control" type="email" name="email" value="{{ $user->email }}" required>

          <label for="email">Email</label>
        </div class="md-form">

        <div class="mt-5">
          <button class="btn color-default btn-block" type="submit">
            UPDATE
          </button>
        </div>

        <div class="mt-1">
          <a href="{{ route('users.show', $user) }}"
            class="btn btn-outline-danger waves-effect btn-block">CANCEL</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection