@extends('index')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('category', [$movie->category->slug]) }}">{{ $movie->category->title }}</a>
                        <a href="{{ route('movie', $movie->slug) }}">{{ $movie->title }}</a>
                        <span>Tập {{ $episode->episode }}</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <style>
                            .iframe_phim iframe {
                                width: 100%;
                                height: 600px;
                            }
                        </style>
                        <div class="iframe_phim">
                            @if ($episode)
                                {!! $episode->linkphim !!}
                            @else
                                <p>Không có tập phim nào được tìm thấy.</p>
                            @endif
                        </div>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Danh sách tập phim</h5>
                        </div>
                        @foreach ($movie->episode as $key => $sotap)
                            <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $sotap->episode) }}">
                                {{ $sotap->episode }}</a>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8">

                    @php
                        $commnet_url = Request::url();
                    @endphp
                    <div class="fb-comments" data-href="{{ $commnet_url }}" data-width="100%" data-numposts="5"></div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>Có thể bạn muốn xem</h5>
                        </div>
                        @foreach ($related->take(4) as $rela)
                            <div class="product__sidebar__view__item set-bg"
                                data-setbg="{{ asset('uploads/movie/' . $rela->image) }}">
                                {{-- <div class="ep">{{ $rela->episode_count }}/{{ $rela->sotap }}</div> --}}
                                @if ($rela->thuocphim == 'phimbo')
                                    @if ($rela->episode_count == $rela->sotap)
                                        <div class="ep">{{ $rela->episode_count }} /
                                            {{ $rela->sotap }} - Hoàn thành
                                        </div>
                                    @else
                                        <div class="ep">{{ $rela->episode_count }} /
                                            {{ $rela->sotap }} - Đang cập nhật
                                        </div>
                                    @endif
                                @elseif($rela->thuocphim == 'phimle')
                                    @foreach ($rela->episode as $episo)
                                        @if ($episo->episode == 'HD')
                                            <div class="ep">HD
                                            </div>
                                        @elseif ($episo->episode == 'FullHD')
                                            <div class="ep">FullHD
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                <?php
                                $random = mt_rand(1000, 10000);
                                ?>
                                <div class="view"><i class="fa fa-eye"></i> <?php echo $random; ?></div>
                                <h5><a href="{{ route('movie', $rela->slug) }}">{{ $rela->title }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
