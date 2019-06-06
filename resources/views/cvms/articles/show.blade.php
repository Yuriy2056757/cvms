@extends('layouts.cvms.master')

@section('title', $article->name)

@section('content')
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 p-0">
            <h2 class="page-section-header text-justify">{{ $article->header_title }}</h2>
          </div>

          <div class="col-sm-2">
            <div class="row flex-row-reverse">
              <a class="btn btn-sm color-default pr-3 pl-3 m-0" href="/cvms/articles/{{ $article->slug }}/edit">
                <i class="fa fa-pencil"></i>
              </a>
            </div>
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
<div class="card m-1 mt-3">
  <div class="card-body">
    <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 p-0">
            <h2 class="page-section-header text-justify">Experience</h2>
          </div>

          <div class="col-sm-4">
            <div class="row flex-row-reverse">
              <a href="{{ route('articles.experiences.create', $article) }}"
                class="btn color-default m-0 d-inline-block">ADD NEW</a>
            </div>
          </div>
        </div>
      </div>

      @if ($article->experiences->count())
        <div class="container pt-3">
          @foreach ($experiences as $experience)
            <div class="row">
              <div class="col-sm-4">
                <div class="row">
                  {{ $experience->company }}
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
                  {{ $experience->title }}
                </div>

                <div class="row">
                  {{ $experience->description }}
                </div>
              </div>

              <div class="col-sm-2">
                <div class="row flex-row-reverse">
                  <form class="d-inline ml-1" onsubmit="return confirm('Delete item?');" method="POST"
                    action="{{ route('articles.experiences.destroy', [$article, $experience]) }}">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-sm color-danger pr-3 pl-3 m-0">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>

                  <a class="btn btn-sm color-default pr-3 pl-3 m-0"
                    href="{{ route('articles.experiences.edit', [$article, $experience]) }}">
                    <i class="fa fa-pencil"></i>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>

<div class="mt-2">
  <a href="{{ route('articles.index') }}"
    class="btn btn-outline-danger waves-effect btn-block">BACK</a>
</div>
@endsection
