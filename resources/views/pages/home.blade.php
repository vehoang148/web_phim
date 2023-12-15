@extends('index')
@section('content')
    {{-- <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                @foreach ($phim_hot->take('5') as $key => $hot)
                    <div class="hero__items set-bg" data-setbg="{{ asset('uploads/movie/' . $hot->image) }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero__text">
                                    <div class="label">{{ $hot->category->title }}</div>
                                    <h2>{{ $hot->title }}</h2>
                                    <p>{{ substr($hot->description, 0, 200) . '...' }}</p>
                                    <a href="{{ route('movie', $hot->slug) }}"><span>Xem Ngay</span> <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Hero Section End --> --}}

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Phim hot mới nhất</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($phim_hot->take(6) as $phimhot)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('uploads/movie/' . $phimhot->image) }}">

                                            @if ($phimhot->thuocphim == 'phimbo')
                                                @if ($phimhot->episode_count == $phimhot->sotap)
                                                    <div class="ep">{{ $phimhot->episode_count }} /
                                                        {{ $phimhot->sotap }} - Hoàn thành
                                                    </div>
                                                @else
                                                    <div class="ep">{{ $phimhot->episode_count }} /
                                                        {{ $phimhot->sotap }} - Đang cập nhật
                                                    </div>
                                                @endif
                                            @elseif($phimhot->thuocphim == 'phimle')
                                                @foreach ($phimhot->episode as $episo)
                                                    @if ($episo->episode == 'HD')
                                                        <div class="ep">HD
                                                        </div>
                                                    @elseif ($episo->episode == 'FullHD')
                                                        <div class="ep">FullHD
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            <?php $randomComment = mt_rand(1, 1000);
                                            $randomView = mt_rand(100, 10000); ?>
                                            <div class="comment"><i class="fa fa-comments"></i> <?php echo $randomComment; ?>
                                            </div>
                                            <div class="view"><i class="fa fa-eye"></i> <?php echo $randomView; ?></div>
                                            <a href="{{ route('movie', $phimhot->slug) }}" class="play-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                            <img src="{{ asset('uploads/movie/' . $phimhot->image) }}" alt="">
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="{{ route('movie', $phimhot->slug) }}">{{ $phimhot->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Phim lẻ mới nhất</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($phim_le_moi_nhat->take('6') as $phimle)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('uploads/movie/' . $phimle->image) }}">
                                            @if ($phimle->thuocphim == 'phimle')
                                                @foreach ($phimle->episode as $episo)
                                                    @if ($episo->episode == 'HD')
                                                        <div class="ep">HD
                                                        </div>
                                                    @elseif ($episo->episode == 'FullHD')
                                                        <div class="ep">FullHD
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            <?php $randomComment = mt_rand(1, 1000);
                                            $randomView = mt_rand(100, 10000); ?>
                                            <div class="comment"><i class="fa fa-comments"></i> <?php echo $randomComment; ?></div>
                                            <div class="view"><i class="fa fa-eye"></i> <?php echo $randomView; ?></div>
                                            <a href="{{ route('movie', $phimle->slug) }}" class="play-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                            <img src="{{ asset('uploads/movie/' . $phimle->image) }}" alt="">
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>{{ $phimle->genre->title }}</li>
                                            </ul>
                                            <h5><a href="{{ route('movie', $phimle->slug) }}">{{ $phimle->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Phim bộ mới nhất</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Xem thêm<span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($phim_bo_moi_nhat->take('6') as $phimbo)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('uploads/movie/' . $phimbo->image) }}">
                                            @if ($phimbo->thuocphim == 'phimbo')
                                                @if ($phimbo->episode_count == $phimhot->sotap)
                                                    <div class="ep">{{ $phimhot->episode_count }} /
                                                        {{ $phimbo->sotap }} - Hoàn thành
                                                    </div>
                                                @else
                                                    <div class="ep">{{ $phimbo->episode_count }} /
                                                        {{ $phimbo->sotap }} - Đang cập nhật
                                                    </div>
                                                @endif
                                            @endif

                                            <?php $randomComment = mt_rand(1, 1000);
                                            $randomView = mt_rand(100, 10000); ?>
                                            <div class="comment"><i class="fa fa-comments"></i> <?php echo $randomComment; ?>
                                            </div>
                                            <div class="view"><i class="fa fa-eye"></i> <?php echo $randomView; ?></div>
                                            <a href="{{ route('movie', $phimbo->slug) }}" class="play-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                            <img src="{{ asset('uploads/movie/' . $phimbo->image) }}" alt="">
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>{{ $phimbo->genre->title }}</li>
                                            </ul>
                                            <h5><a href="{{ route('movie', $phimbo->slug) }}">{{ $phimbo->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="live__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Phim chiếu rạp</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">Xem thêm<span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/live/live-1.jpg">
                                        <div class="ep">18 / 18</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Active</li>
                                            <li>Movie</li>
                                        </ul>
                                        <h5><a href="#">Shouwa Genroku Rakugo Shinjuu</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>


                {{-- Sidebar --}}
                @include('pages.include.sidebarHome')
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
