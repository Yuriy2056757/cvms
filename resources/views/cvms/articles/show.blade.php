@extends('layouts.cvms.master')

@section('title', $article->name)

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-md-flex justify-content-between">
        <h2 class="page-section-header text-justify">{{ $article->header_title }}</h2>

        @if (Auth::user()->is_admin)
          <div>
            <a class="btn btn-sm color-default pr-3 pl-3 m-0" href="/cvms/articles/{{ $article->slug }}/edit">
              <i class="fa fa-pencil"></i>
            </a>
          </div>
        @endif
      </div>

      <p>
        {{ $article->summary }}
      </p>
    </div>
  </div>
</div>

@if ($article->experiences->count())
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-flex justify-content-between">
        <h2 class="page-section-header">Experience</h2>
      </div>

      <div class="container">
        @foreach ($experiences as $experience)
          <div class="row">
            <div class="col-sm-4">
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

            <div class="col-sm-8">
              <div class="row">
                {{ $experience->title }}
              </div>

              <div class="row">
                {{ $experience->description }}
              </div>
            </div>
          </div>

          @if (Auth::user()->is_admin)
            <div class="row float-right">
                <a class="btn btn-sm color-default pr-3 pl-3 m-0" href="/cvms/experiences/{{ $article->slug }}">
                  <i class="fa fa-pencil"></i>
                </a>

                <form class="d-inline ml-1" onsubmit="return confirm('Delete item?');" method="POST"
                  action="/cvms/experiences/{{ $article->slug }}">
                  @method('DELETE')
                  @csrf

                  <button type="submit" class="btn btn-sm color-danger pr-3 pl-3 m-0">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
@endif
@endsection
