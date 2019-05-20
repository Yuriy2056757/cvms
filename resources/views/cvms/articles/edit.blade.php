@extends('layouts.cvms.master')

@section('title', 'Edit article')

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Edit article</h2>
      </div>

      <form class="md-form" method="POST" action="/cvms/articles/{{ $article->slug }}/">
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
          <input class="form-control" type="text" name="name" value="{{ $article->name }}" required>

          <label for="name">Name</label>
        </div class="md-form">

        <div class="md-form">
          <input class="form-control" type="text" name="slug" value="{{ $article->slug }}" required>

          <label for="slug">Slug</label>
        </div class="md-form">

        <div class="md-form">
          <input class="form-control" type="text" name="seo_title" value="{{ $article->seo_title }}" required>

          <label for="seo_title">Search engine title</label>
        </div class="md-form">

        <div class="md-form mt-4">
          <input class="form-control" type="text" name="header_title" value="{{ $article->header_title }}" required>

          <label for="header_title">Header title</label>
        </div class="md-form">

        <div class="md-form">
          <textarea name="seo_description" type="text" id="materialContactFormMessage" class="form-control md-textarea"
            rows="2" required>{{ $article->seo_description }}</textarea>

          <label for="seo_description">Search engine description</label>
        </div class="md-form">

        <div class="md-form">
          <textarea name="summary" type="text" id="materialContactFormMessage" class="form-control md-textarea"
            rows="6" required>{{ $article->summary }}</textarea>

          <label for="summary">Summary</label>
        </div class="md-form">

        <h4>Experience</h4>

        @if ($article->experiences->count())
          <div class="container">
            @foreach ($experiences as $experience)
              <div class="row">
                <div class="col-sm">
                  <div class="row">
                    {{ $experience->company_name }}
                  </div>

                  <div class="row">
                    {{

                      // Format job start date
                      $date_start = Carbon\Carbon::createFromTimestamp(
                        strtotime($experience->date_start)
                      )->isoFormat('MMM Y')
                    }}

                    -

                    {{

                      // Format job end date
                      $date_end = Carbon\Carbon::createFromTimestamp(
                        strtotime($experience->date_end)
                      )->isoFormat('MMM Y')
                    }}

                    &#8226;

                    {{

                      // Format difference between job start & end date
                      Carbon\Carbon::createFromTimestamp(strtotime($experience->date_start))->diffInMonths(
                        Carbon\Carbon::createFromTimestamp(strtotime($experience->date_end))
                      )
                    }}

                    mos
                  </div>
                </div>

                <div class="col-sm">
                  <div class="row">
                    {{ $experience->title }}
                  </div>

                  <div class="row">
                    {{ $experience->description }}
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif

        <div class="ml-4 custom-control custom-checkbox">
          <input name="is_active" type="checkbox" class="custom-control-input" id="defaultUnchecked"
            {{ $article->is_active ? 'checked' : '' }}>
          <label class="custom-control-label disable-selection" for="defaultUnchecked">Publish article</label>
        </div>

        <div class="mt-5">
          <button class="btn color-default btn-block" type="submit">
            UPDATE
          </button>
        </div>

        <div class="mt-1">
          <a href="{{ route('articles.index') }}" class="btn btn-outline-danger waves-effect btn-block">CANCEL</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
