@extends('layouts.articles.master')

@section('title', $article->seo_title)
@section('description', $article->seo_description)

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="d-md-flex justify-content-between">
        <h2 class="page-section-header text-justify">{{ $article->header_title }}</h2>
      </div>

      <p>
        {{ $article->summary }}
      </p>
    </div>
  </div>
</div>

{{-- Experience --}}
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 p-0">
            <h2 class="page-section-header text-justify">Experience</h2>
          </div>
        </div>
      </div>

      @if ($article->experiences->count())
        <div class="container pt-3">
          @foreach ($experiences as $experience)
            <div class="row experience-item">
              <div class="col-sm-4">
                <div class="row">
                  <strong>
                    {{ $experience->company }}
                  </strong>
                </div>

                <div class="row">
                  {{

                    // Format job start date
                    $date_start = $experience->date_start->isoFormat('MMM Y')
                  }}

                  -

                  {{

                    // Format job end date
                    $date_end = $experience->date_end->isoFormat('MMM Y')
                  }}

                  &#8226;

                  {{

                    // Format difference between job start & end date
                    $experience->date_start->diffInMonths($experience->date_end)
                  }}

                  mos
                </div>
              </div>

              <div class="col-sm-6">
                <div class="row">
                  <strong>
                    {{ $experience->title }}
                  </strong>
                </div>

                <div class="row">
                  {{ $experience->description }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
