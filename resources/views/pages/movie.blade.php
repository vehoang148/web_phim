@extends('index')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href=""><i class="fa fa-home"></i> Home</a>
                        <a href="">{{ $movie->genre->title }}</a>
                        <span>{{ $movie->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ asset('uploads/movie/' . $movie->image) }}">
                            <?php $randomComment = mt_rand(1, 1000);
                            $randomView = mt_rand(100, 15000);
                            $randomViewPhim = mt_rand(3000, 15000); ?>
                            <div class="comment"><i class="fa fa-comments"></i> <?php echo $randomComment; ?></div>
                            <div class="view"><i class="fa fa-eye"></i> <?php echo $randomView; ?></div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $movie->title }}</h3>
                                <span>{{ $movie->name_eng }}</span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
                            <p>{{ $movie->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Danh mục:</span>{{ $movie->category->title }}</li>
                                            <li><span>Thuộc loại:</span>
                                                @if ($movie->thuocloai == 0)
                                                    Phim bộ
                                                @elseif ($movie->thuocloai == 1)
                                                    Phim lẻ
                                                @endif
                                            </li>
                                            <li><span>Năm:</span> {{ $movie->ngaytao }}</li>
                                            <li><span>Quốc gia:</span> {{ $movie->country->title }}</li>
                                            <li><span>Thể loại:</span>
                                                @foreach ($movie->movie_genre as $index => $mov_gen)
                                                    {{ $mov_gen->title }}
                                                    @if ($index < count($movie->movie_genre) - 1)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Định dạng:</span>
                                                @if ($movie->phude == 0)
                                                    Vietsub
                                                @elseif ($movie->phude == 1)
                                                    Thuyết minh
                                                @endif

                                            </li>
                                            @if ($movie->thuocphim == 'phimbo')
                                                @if ($episode_all == $movie->sotap)
                                                    <li><span>Số tập:</span> {{ $episode_all }} / {{ $movie->sotap }} -
                                                        Hoàn thành</li>
                                                @else
                                                    <li><span>Số tập:</span> {{ $episode_all }} / {{ $movie->sotap }} -
                                                        Đang cập nhật</li>
                                                @endif
                                            @elseif($movie->thuocphim == 'phimle')
                                                <li><span>Link phim:</span>
                                                    @foreach ($episode as $key => $epi)
                                                        {{-- <a
                                                    href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $epi->episode) }}"> --}}
                                                        @if ($epi->episode == 'HD')
                                                            HD
                                                        @elseif ($epi->episode == 'Full')
                                                            FullHD
                                                        @endif
                                                    @endforeach
                                            @endif
                                            </li>


                                            @if (@isset($episode))
                                                <li><span>Thời lượng:</span> {{ $movie->thoiluong }}</li>
                                            @else
                                                <li><span>Thời lượng:</span> {{ $movie->thoiluong }}</li>
                                            @endif

                                            <li><span>Chất lượng:</span>
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
                                            </li>
                                            <li><span>Lượt xem:</span> <?php echo $randomViewPhim; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-share"></i> Share</a>

                                    @if ($movie->thuocphim == 'phimbo')
                                        <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $episode_tapdau->episode) }}"
                                            class="watch-btn"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></a>
                                    @elseif ($movie->thuocphim == 'phimle')
                                        @foreach ($episode as $key => $sotap)
                                            <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $sotap->episode) }}"
                                                class="watch-btn"><span>Xem Ngay</span> <i
                                                    class="fa fa-angle-right"></i></a>
                                        @endforeach
                                    @endif
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-1.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                    "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-2.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-3.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-4.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                    "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-5.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-6.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="#">
                            <textarea placeholder="Your Comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>Có thể bạn muốn xem</h5>
                        </div>
                        @foreach ($related->take(6) as $rela)
                            <div class="product__sidebar__view__item set-bg"
                                data-setbg="{{ asset('uploads/movie/' . $rela->image) }}">
                                @php
                                    $episodeCount = $episode->where('movie_id', $rela->id)->count();
                                @endphp
                                <div class="ep">{{ $rela->episodes }}/{{ $episodeCount }}</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">{{ $rela->title }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection
