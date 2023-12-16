<style>
    .product__sidebar__view__item {
        position: relative;
        overflow: hidden;
    }

    .product__sidebar__view__item img {
        transition: filter 0.3s ease;
    }

    .product__sidebar__view__item:hover img {
        filter: blur(3px);
    }

    .play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1.2);
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
        color: white;
        /* Set play button color to white */
    }

    .product__sidebar__view__item:hover .play-btn {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
</style>



<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product__sidebar">
        <div class="product__sidebar__view">
            <div class="section-title">
                <h5>Xem nhiều</h5>
            </div>
            <ul class="filter__controls">
                <li class="active" data-filter="*">Ngày</li>
                <li data-filter=".week">Tháng</li>
                <li data-filter=".month">Năm</li>
                {{-- <li data-filter=".years">Years</li> --}}
            </ul>


            <div class="filter__gallery">
                @foreach ($phimhot_sidebar as $hot_side)
                    <div class="product__sidebar__view__item set-bg mix day years"
                        data-setbg="{{ asset('uploads/movie/' . $hot_side->image) }}">
                        @if ($hot_side->thuocphim == 'phimbo')
                            @if ($hot_side->episode_count == $phimhot->sotap)
                                <div class="ep">{{ $phimhot->episode_count }} /
                                    {{ $hot_side->sotap }} - Hoàn thành
                                </div>
                            @else
                                <div class="ep">{{ $hot_side->episode_count }} /
                                    {{ $hot_side->sotap }} - Đang cập nhật
                                </div>
                            @endif
                        @elseif($hot_side->thuocphim == 'phimle')
                            @foreach ($hot_side->episode as $episo)
                                @if ($episo->episode == 'HD')
                                    <div class="ep">HD
                                    </div>
                                @elseif ($episo->episode == 'FullHD')
                                    <div class="ep">FullHD
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>

                        <a href="{{ route('movie', $phimle->slug) }}" class="play-btn">
                            <i class="fa fa-play"></i>
                        </a>
                        <h5><a href="{{ route('movie', $hot_side->slug) }}">{{ $hot_side->title }}</a></h5>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="product__sidebar__comment">
            <div class="section-title">
                <h5>Phim hot</h5>
            </div>
            @foreach ($phimhot_sidebar->take('8') as $hot_side)
                <div class="product__sidebar__comment__item">
                    <div class="product__sidebar__comment__item__pic">
                        <img src="{{ asset('uploads/movie/' . $hot_side->image) }}" alt=""
                            style="max-width: 100px; height: auto;">
                    </div>

                    <div class="product__sidebar__comment__item__text">
                        <ul>
                            <li>{{ $hot_side->genre->title }}</li>
                        </ul>
                        <?php
                        $random = mt_rand(100, 4000);
                        ?>
                        <h5><a href="#">{{ $hot_side->title }}</a></h5>
                        <span><i class="fa fa-eye"></i> {{ $random }} Viewes</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
</section>
