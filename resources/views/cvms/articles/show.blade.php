@extends('layouts.cvms.master')

@section('title', $article->name)

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-md-flex justify-content-between">
        <h2 class="page-section-header text-justify">{{ $article->header_title }}</h2>

        @if (Auth::user()->is_admin)
          <a href="/cvms/articles/{{ $article->slug }}/edit">EDIT</a>
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

          <div class="row d-md-flex justify-content-between">
            @if (Auth::user()->is_admin)
              <div>

              </div>

              <div>
                <a href="/cvms/experiences/{{ $experience->slug }}/edit">EDIT</a>

                {{-- NEEDS TO BE A FORM TO DELETE --}}
                <a href="/cvms/experiences/{{ $experience->slug }}/">DELETE</a>
              </div>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endif
@endsection
