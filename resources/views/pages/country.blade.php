@extends('index')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $country_slug->title }}</a> »
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
                    <h1 class="section-title"><span>{{ $country_slug->title }}</span></h1>
                </div>
                <div class="section-bar">
                    <div>
                        @include('pages.include.filter')
                    </div>
                </div>
                <div class="halim_box">
                    @foreach ($movie as $key => $cou)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie', $cou->slug) }}" title="{{ $cou->title }}">
                                    <figure><img class="lazy img-responsive" src="{{ asset('uploads/movie/' . $cou->image) }}"
                                            alt="{{ $cou->title }}" title="{{ $cou->title }}"></figure>
                                    <span class="status">
                                        @if ($cou->quality == 0)
                                            HD
                                        @elseif ($cou->quality == 1)
                                            SD
                                        @elseif ($cou->quality == 2)
                                            FullHD
                                        @elseif ($cou->quality == 3)
                                            2K
                                        @elseif ($cou->quality == 4)
                                            4K
                                        @else
                                            Trailer
                                        @endif
                                    </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if ($cou->phude == 0)
                                            Vietsub
                                        @elseif ($cou->phude == 1)
                                            Thuyết minh
                                        @endif
                                    </span>
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{ $cou->title }}</p>
                                            <p class="original_title">{{ $cou->name_eng }}</p>
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
