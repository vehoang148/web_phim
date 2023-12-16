@extends('index')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('homepage') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="#">Phim bộ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Phim bộ mới nhất</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Lọc:</p>
                                        <select>
                                            <option value="">A-Z</option>
                                            <option value="">1-10</option>
                                            <option value="">10-50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($movie->take('21') as $key => $movie_bo)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('uploads/movie/' . $movie_bo->image) }}">

                                            @if ($movie_bo->thuocphim == 'phimbo')
                                                @if ($movie_bo->episode_count == $movie_bo->sotap)
                                                    <div class="ep">{{ $movie_bo->episode_count }} /
                                                        {{ $movie_bo->sotap }} - Hoàn thành
                                                    </div>
                                                @else
                                                    <div class="ep">{{ $movie_bo->episode_count }} /
                                                        {{ $movie_bo->sotap }} - Đang cập nhật
                                                    </div>
                                                @endif
                                            @elseif($movie_bo->thuocphim == 'phimle')
                                                @foreach ($movie_bo->episode as $episo)
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
                                            <a href="{{ route('movie', $movie_bo->slug) }}" class="play-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                            <img src="{{ asset('uploads/movie/' . $movie_bo->image) }}" alt="">
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a
                                                    href="{{ route('movie', $movie_bo->slug) }}">{{ $movie_bo->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Sidebar --}}
                    @include('pages.include.sidebarView')
                </div>
            </div>
    </section>
    <!-- Product Section End -->
@endsection
