@extends('layouts.cvms.master')

@section('title', 'Edit profile info')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit profile</h2>
      </div>

      <form class="md-form" method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
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

        <div class="md-form">
          <input class="form-control" type="password" name="current_password">

          <label for="name">Current password</label>
        </div class="md-form">

         <div class="md-form">
          <input class="form-control" type="password" name="new_password">

          <label for="name">New password</label>
        </div class="md-form">

         <div class="md-form">
          <input class="form-control" type="password" name="new_password_confirmation">

          <label for="name">Confirm password</label>
        </div class="md-form">

        <div>
          <div class="mb-3">
            Profile image
          </div>

          <div>
            @if ($user->image)
              <img
                id="image_preview"
                width="128"
                height="128"
                src="{{ asset('storage/' . $user->image) }}"
                class="rounded-circle z-depth-1 mb-3"
              />
            @else
              <img
                id="image_preview"
                width="128"
                height="128"
                src="{{ asset('placeholder-avatar.jpg') }}"
                class="rounded-circle z-depth-1 mb-3"
              />
            @endif
          </div>

          <div class="input-group">
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                name="image"
                aria-describedby="inputGroupFileAddon01"
                onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])"
              />
              <label class="custom-file-label" for="image">Upload avatar</label>
            </div>
          </div>
        </div>

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
