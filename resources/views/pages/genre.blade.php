@extends('index')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="./categories.html">Thể loại</a>
                        <span>{{ $genre_slug->title }}</span>
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
                                        <h4>{{ $genre_slug->title }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                    <div class="product__page__filter">
                                        <form action="{{ route('locphim') }}" method="GET">

                                            <select class="form-select" name="order" aria-label="Default select example">
                                                <option selected>Sắp xếp </option>
                                                <option value="date">Ngày đăng</option>
                                                <option value="year_release">Năm sản xuất</option>
                                                <option value="name_a_z">Tên phim</option>
                                                <option value="views">Lượt xem</option>
                                            </select>
                                            <select class="form-select" name="genre" aria-label="Default select example">
                                                <option selected>Thể loại </option>
                                                @foreach ($genre as $gen)
                                                    <option value="{{ $gen->id }}">{{ $gen->title }}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-select" name="country" aria-label="Default select example">
                                                <option selected>Quốc gia </option>
                                                @foreach ($country as $count)
                                                    <option value="{{ $count->id }}">{{ $count->title }}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-select" name="year" aria-label="Default select example">
                                                <option selected>Năm</option>
                                                @for ($year = 2010; $year <= 2024; $year++)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                            <input value="Lọc phim"  type="submit" class="btn btn-primary">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($movie->take('21') as $key => $movie_genre)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('uploads/movie/' . $movie_genre->image) }}">
                                            <div class="ep">18 / 18</div>
                                            <?php $randomComment = mt_rand(1, 1000);
                                            $randomView = mt_rand(100, 10000); ?>
                                            <div class="comment"><i class="fa fa-comments"></i> <?php echo $randomComment; ?></div>
                                            <div class="view"><i class="fa fa-eye"></i> <?php echo $randomView; ?></div>
                                            <a href="{{ route('movie', $movie_genre->slug) }}" class="play-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                            <img src="{{ asset('uploads/movie/' . $movie_genre->image) }}" alt="">
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a
                                                    href="{{ route('movie', $movie_genre->slug) }}">{{ $movie_genre->title }}</a>
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
