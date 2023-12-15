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
                <h5>Top Views</h5>
            </div>
            <ul class="filter__controls">
                <li class="active" data-filter="*">Day</li>
                <li data-filter=".week">Week</li>
                <li data-filter=".month">Month</li>
                <li data-filter=".years">Years</li>
            </ul>
            <div class="filter__gallery">
                <div class="product__sidebar__view__item set-bg mix day years" data-setbg="img/sidebar/tv-1.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Boruto: Naruto next generations</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix month week" data-setbg="img/sidebar/tv-2.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix week years" data-setbg="img/sidebar/tv-3.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix years month" data-setbg="img/sidebar/tv-4.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix day" data-setbg="img/sidebar/tv-5.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Fate stay night unlimited blade works</a></h5>
                </div>
            </div>
        </div>
        <div class="product__sidebar__comment">
            <div class="section-title">
                <h5>Phim mới</h5>
            </div>
            @foreach ($phimhot_sidebar as $key => $hot_side)
            <div class="product__sidebar__comment__item">
                <div class="product__sidebar__comment__item__pic">
                    <img src="img/sidebar/comment-1.jpg" alt="">
                </div>
                <div class="product__sidebar__comment__item__text">
                    <ul>
                        <li>Active</li>
                        <li>Movie</li>
                    </ul>
                    <h5><a href="#">{{$hot_side->title}}</a></h5>
                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
