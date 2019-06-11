@extends('layouts.cvms.master')

@section('title', 'Profile')

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit profile</h2>

        <a href="{{ route('users.edit', $user) }}">EDIT</a>
      </div>
    </div>

    <table class="table table-borderless table-responsive mt-4 mb-0">
      <tbody>
        <tr>
          <th class="p-0" scope="row">
            <p>Name:</p>
          </th>

          <td class="p-0 pl-5">
            <p>{{ Auth::user()->name }}</p>
          </td>
        </tr>

        <tr>
          <th class="p-0" scope="row">
            <p>E-mail:</p>
          </th>

          <td class="p-0 pl-5">
            <p>{{ Auth::user()->email }}</p>
          </td>
        </tr>
      </tbody>
    </table>

    <a class="btn color-default ml-0">CHANGE PASSWORD</a>

    <form
      class="d-inline"
      onsubmit="return confirm('Are you sure you want to delete all your account data?');"
      method="POST" action="{{ route('users.destroy', $user) }}"
    >
      @method('DELETE')
      @csrf

      <button type="submit" class="btn color-danger">REMOVE ACCOUNT</button>
    </form>
  </div>
</div>
@endsection
