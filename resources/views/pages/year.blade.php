@extends('index')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <span> Phim thuộc năm
                                    @for ($year_a = 2000; $year_a <= 2024; $year_a++)
                                        <span class="breadcrumb_last" aria-current="page"> » <a title="{{ $year_a }}"
                                                href="{{ url('nam/' . $year_a) }}">{{ $year_a }}</a></span>
                                    @endfor
                                </span>
                            </span>
                        </div>
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
                    <h1 class="section-title"><span>Năm: {{ $year }}</span></h1>
                </div>
                <div class="halim_box">
                    @foreach ($movie as $key => $cate)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie', $cate->slug) }}" title="{{ $cate->title }}">
                                    <figure><img class="lazy img-responsive"
                                            src="{{ asset('uploads/movie/' . $cate->image) }}" alt="{{ $cate->title }}"
                                            title="{{ $cate->title }}"></figure>
                                    <span class="status">
                                        @if ($cate->quality == 0)
                                            HD
                                        @elseif ($cate->quality == 1)
                                            SD
                                        @elseif ($cate->quality == 2)
                                            FullHD
                                        @elseif ($cate->quality == 3)
                                            2K
                                        @elseif ($cate->quality == 4)
                                            4K
                                        @else
                                            Trailer
                                        @endif
                                        @if ($cate->quality != 5)
                                    </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if ($cate->phude == 0)
                                            Vietsub
                                        @elseif ($cate->phude == 1)
                                            Thuyết minh
                                        @endif
                                    </span>
                    @endif
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                            <p class="entry-title">{{ $cate->title }}</p>
                            <p class="original_title">{{ $cate->name_eng }}</p>
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
