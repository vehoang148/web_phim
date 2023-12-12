@extends('index')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span>
                                    <a href="#">{{ $movie->category->title }}</a> » <span><a
                                            href="#">{{ $movie->country->title }}</a> »
                                        <span class="breadcrumb_last" aria-current="page">
                                        </span>
                                    </span>
                                    {{ $movie->title }}
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

            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        {{-- <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div> --}}
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{ asset('uploads/movie/' . $movie->image) }}"
                                    alt="{{ $movie->title }}">
                                @if ($movie->quality != 5)
                                    <div class="bwa-content">
                                        <div class="loader"></div>
                                        <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $episode_tapdau->episode) }}"
                                            class="bwac-btn">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                @else
                                    <a href="#watch_trailer" class="btn btn-primary watch_trailer"
                                        style="display: block">Xem Trailer</a>
                                @endif
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie->title }}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->title }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                            @if ($movie->quality == 0)
                                                HD
                                            @elseif ($movie->quality == 1)
                                                SD
                                            @elseif ($movie->quality == 2)
                                                FullHD
                                            @elseif ($movie->quality == 3)
                                                2K
                                            @elseif ($movie->quality == 4)
                                                4K
                                            @else
                                                Trailer
                                            @endif
                                        </span>
                                        @if ($movie->quality != 5)
                                            <span class="episode">
                                                @if ($movie->phude == 0)
                                                    Vietsub
                                                @elseif($movie->phude == 1)
                                                    Thuyết minh
                                                @endif
                                            </span>
                                        @endif
                                    </li>

                                    {{-- <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li> --}}

                                    <li class="list-info-group-item"><span>Thời lượng</span> : {{ $movie->thoiluong }}</li>

                                    @if ($movie->thuocphim == 'phimbo')
                                        <li class="list-info-group-item"><span>Tập phim</span> :
                                            {{ $episode_all }}/{{ $movie->sotap }} -
                                            @if ($episode_all == $movie->sotap)
                                                Hoàn thành
                                            @else
                                                Đang cập nhật
                                            @endif
                                        </li>
                                    @elseif($movie->thuocphim == 'phimle')
                                        <li class="list-info-group-item"><span>Tập phim</span> :
                                            Phim lẻ
                                        </li>
                                    @endif

                                    <li class="list-info-group-item"><span>Danh mục</span> : <a
                                            href="href="{{ route('country', $movie->category->slug) }}""
                                            rel="tag">{{ $movie->category->title }}</a></li>
                                    <li class="list-info-group-item"><span>Thể loại</span> :
                                        @foreach ($movie->movie_genre as $mov_gen)
                                            <a href="{{ route('genre', $mov_gen->slug) }}"
                                                rel="category tag">{{ $mov_gen->title }}</a>
                                        @endforeach
                                    </li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> : <a
                                            href="href="{{ route('country', $movie->country->slug) }}""
                                            rel="tag">{{ $movie->country->title }}</a></li>

                                    <li class="list-info-group-item"><span>Tập phim mới nhất</span> :
                                        @foreach ($episode_3_tapmoi as $moinhat)
                                            <a href="{{ url('xem-phim/' . $moinhat->movie->slug . '/tap-' . $moinhat->episode) }}"
                                                rel="tag">Tập {{ $moinhat->episode }}</a>
                                        @endforeach

                                    </li>

                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="halim_trailer"></div>
                        <div class="clearfix"></div>

                        @if ($movie->quality == 5)
                            <div class="section-bar clearfix">
                                <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
                                <article id="post-38424" class="item-content">
                                    <div class="entry-content htmlwrap clearfix">
                                        <div class="video-item halim-entry-box">
                                            <article id="watch_trailer" class="item-content">
                                                <iframe width="100%" height="315"
                                                    src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </article>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endif
                        @if ($movie->quality != 5)
                            <div class="section-bar clearfix">
                                <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                                <article id="post-38424" class="item-content">
                                    <div class="entry-content htmlwrap clearfix">
                                        <div class="video-item halim-entry-box">
                                            <article id="post-38424" class="item-content">
                                                Phim <a href="#">{{ $movie->title }}</a> - {{ $movie->year }} -
                                                {{ $movie->country->title }}:
                                                <p>{{ $movie->description }}</p>
                                            </article>
                                        </div>
                                    </div>
                                </article>
                            </div>
                    </div>

                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
                        <article id="post-38424" class="item-content">
                            <div class="entry-content htmlwrap clearfix">
                                <div class="video-item halim-entry-box">
                                    <article id="post-38424" class="item-content">
                                        <h5>Từ Khoá Tìm Kiếm:</h5>
                                        @if ($movie->tags != null)
                                            @php
                                                $tags = [];
                                                $tags = explode(',', $movie->tags);
                                            @endphp
                                            @foreach ($tags as $key => $tag)
                                                {{ $tag }}
                                            @endforeach
                                        @else
                                            {{ $movie->title }}
                                        @endif

                                    </article>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endif
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                        <article id="post-38424" class="item-content">
                            <div class="entry-content htmlwrap clearfix">
                                @php
                                    $current_url = Request::url();
                                @endphp
                                <div class="video-item halim-entry-box">
                                    <article id="watch_trailer" class="item-content">
                                        <div class = "fb-comments" data-href = "{{ $current_url }}" data-width = "100%"
                                            data-numposts = "5"></div>
                                    </article>

                                </div>
                            </div>
                        </article>
                    </div>

                </div>
            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach ($related as $key => $rela)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $rela->slug) }}"
                                        title="{{ $rela->title }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('uploads/movie/' . $rela->image) }}"
                                                alt=" {{ $rela->title }}" title="{{ $rela->title }}"></figure>
                                        <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>Vietsub</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $rela->title }}</p>
                                                <p class="original_title">Tên tiếng anh</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                </div>
            </section>

        </main>
        {{--  Sidebar  --}}
        @include('pages.include.sidebar')
    </div>
@endsection
