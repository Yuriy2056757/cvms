@extends('layouts.articles.master')

@section('title', $article->seo_title)
@section('description', $article->seo_description)
@section('robots', $article->robots ? 'index, follow' : 'noindex, nofollow')

@section('content')
<div class="container p-0 mt-3">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body align-self-center">
          <div class="pb-3">
            @if ($article->image)
              <img
                width="128"
                height="128"
                src="{{ asset('storage/' . $article->image) }}"
                alt="Image"
                class="rounded-circle img-fluid"
              >
            @else
              <img
                width="128"
                height="128"
                src="http://lorempixel.com/256/256/"
                alt="Image"
                class="rounded-circle img-fluid"
              >
            @endif
          </div>

          <div class="text-center h4">
            {{ $article->display_name }}
          </div>

          <div class="text-center">
            {{ $article->display_subtitle }}
          </div>
        </div>
      </div>

      {{-- Contact info --}}
      <div class="card mt-3">
          <div class="card-body">
            <div class="page-section">
              <div class="container">
                <div class="row">
                  <div class="col-sm-10 p-0">
                    <h3 class="page-section-header text-justify">Contact info</h3>
                  </div>
                </div>
              </div>

              @if ($article->contactInfos->count())
                <div class="container">
                  @foreach ($contactInfos as $contactInfo)
                    <div class="row contact-info-item">
                      <div class="col-sm-7">
                        <div>
                          <b>{{ $contactInfo->title }}</b>
                        </div>

                        <div>
                          {{ $contactInfo->description }}
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
        </div>

      {{-- Skills --}}
      <div class="card mt-3">
        <div class="card-body">
          <div class="page-section">
            <div class="container">
              <div class="row">
                <div class="col-sm-10 p-0">
                  <h3 class="page-section-header text-justify">Skills</h3>
                </div>
              </div>
            </div>

            @if ($article->skills->count())
              <div class="container">
                @foreach ($skills as $skill)
                  <div class="row skill-item">
                    <div class="col-sm-7">
                      <div>
                        {{ $skill->title }}
                      </div>

                      <div class="row progress">
                        <div
                          class="progress-bar sunny-morning-gradient"
                          role="progressbar"
                          style="width: {{ $skill->percentage }}%;"
                          aria-valuenow="25"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card">
        <div class="card-body">
          <div class="page-section">
            <div class="container">
              <div class="row">
                <div class="col-sm-10 p-0">
                  <h3 class="page-section-header text-justify">{{ $article->header_title }}</h3>
                </div>
              </div>
            </div>

            <p>
              {{ $article->summary }}
            </p>
          </div>
        </div>
      </div>

      {{-- Experience --}}
      <div class="card mt-3">
        <div class="card-body">
          <div class="page-section">
            <div class="container">
              <div class="row">
                <div class="col-sm-8 p-0">
                  <h3 class="page-section-header text-justify">Experience</h3>
                </div>
              </div>
            </div>

            @if ($article->experiences->count())
              <div class="container pt-3">
                @foreach ($experiences as $experience)
                  <div class="row experience-item">
                    <div class="col-sm-5">
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

                    <div class="col-sm-5">
                      <div class="row">
                        <strong>
                          {{ $experience->title }}
                        </strong>
                      </div>

                      @if ($experience->description)
                        <div class="row">
                          {{ $experience->description }}
                        </div>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      </div>

      {{-- Qualifications --}}
      <div class="card mt-3">
        <div class="card-body">
          <div class="page-section">
            <div class="container">
              <div class="row">
                <div class="col-sm-8 p-0">
                  <h3 class="page-section-header text-justify">Qualifications</h3>
                </div>
              </div>
            </div>

            @if ($article->qualifications->count())
              <div class="container pt-3">
                @foreach ($qualifications as $qualification)
                  <div class="row qualification-item">
                    <div class="col-sm-4">
                      <div class="row">
                        <strong>
                          {{ $qualification->company }}
                        </strong>
                      </div>

                      <div class="row">
                        {{

                          // Format job start date
                          $date_start = $qualification->date_start->isoFormat('MMM Y')
                        }}

                        -

                        {{

                          // Format job end date
                          $date_end = $qualification->date_end->isoFormat('MMM Y')
                        }}
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="row">
                        <strong>
                          {{ $qualification->title }}
                        </strong>
                      </div>

                      @if ($qualification->description)
                        <div class="row">
                          {{ $qualification->description }}
                        </div>
                        @endif
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
