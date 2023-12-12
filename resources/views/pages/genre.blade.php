@extends('index')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $genre_slug->title }}</a> »
                                    <span class="breadcrumb_last" aria-current="page">2020</span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>{{ $genre_slug->title }}</span></h1>
                </div>
                <div class="halim_box">
                    @foreach ($movie as $key => $gen)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie', $gen->slug) }}" title="{{ $gen->title }}">
                                    <figure><img class="lazy img-responsive" src="{{ asset('uploads/movie/' . $gen->image) }}"
                                            alt="{{ $gen->title }}" title="{{ $gen->title }}"></figure>
                                    <span class="status">
                                        @if ($gen->quality == 0)
                                            HD
                                        @elseif ($gen->quality == 1)
                                            SD
                                        @elseif ($gen->quality == 2)
                                            FullHD
                                        @elseif ($gen->quality == 3)
                                            2K
                                        @elseif ($gen->quality == 4)
                                            4K
                                        @else
                                            Trailer
                                        @endif
                                    </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if ($gen->phude == 0)
                                            Vietsub - Tập 1/{{ $gen->sotap }}
                                        @elseif ($gen->phude == 1)
                                            Thuyết minh - Tập 1/{{ $gen->sotap }}
                                        @endif
                                    </span>
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{ $gen->title }}</p>
                                            <p class="original_title">{{ $gen->name_eng }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {{ $movie->links('pagination::bootstrap-4') }}
                </div>
            </section>
        </main>
        {{--  Sidebar  --}}
        @include('pages.include.sidebar')
    </div>
    </div>
@endsection
