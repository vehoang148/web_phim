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



<div class="product__pagination">
    <a href="#" class="current-page">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#"><i class="fa fa-angle-double-right"></i></a>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product__sidebar">
        <div class="product__sidebar__view">
            <div class="section-title">
                <h5>Xem nhiều</h5>
            </div>
            <ul class="filter__controls">
                <li class="active" data-filter="*">Day</li>
                <li data-filter=".week">Week</li>
                <li data-filter=".month">Month</li>
                <li data-filter=".years">Years</li>
            </ul>
            <div class="filter__gallery">
                @foreach ($phimhot_sidebar as $key => $hot_side)
                    <div class="product__sidebar__view__item set-bg mix day years"
                        data-setbg="{{ asset('uploads/movie/' . $hot_side->image) }}">
                        <div class="ep">18 / ?</div>
                        <?php
                        $random = mt_rand(1000, 5000);
                        ?>
                        <div class="view"><i class="fa fa-eye"></i> <?php echo $random; ?></div>
                        <h5><a href="#">{{ $hot_side->title }}</a></h5>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="product__sidebar__comment">
            <div class="section-title">
                <h5>Phim mới</h5>
            </div>
            @foreach ($phimhot_sidebar as $key => $hot_side)
                <div class="product__sidebar__comment__item">
                    <div class="product__sidebar__comment__item__pic">
                        <img src="{{ asset('uploads/movie/' . $hot_side->image) }}" alt=""
                            style="max-width: 100px; height: auto;">
                    </div>
                    <div class="product__sidebar__comment__item__text">
                        <ul>
                            {{ $hot_side->genre->title }}
                        </ul>
                        <h5><a href="{{ route('movie', $hot_side->slug) }}">{{ $hot_side->title }}</a></h5>
                        <?php
                        $random = mt_rand(10000, 30000);
                        ?>
                        <span><i class="fa fa-eye"></i> <?php echo $random; ?> Lượt xem</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
