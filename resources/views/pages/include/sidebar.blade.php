<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Phim hot</span>
             {{-- <ul class="halim-popular-tab" role="tablist">
                <li role="presentation" class="active">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                </li>
             </ul> --}}
          </div>
       </div>
       <section class="tab-content">
          <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
             <div class="halim-ajax-popular-post-loading hidden"></div>
             <div id="halim-ajax-popular-post" class="popular-post">
                @foreach ($phimhot_sidebar as $key => $hot_side)
                <div class="item post-37176">
                   <a href="{{route('movie',$hot_side->slug)}}"  title="{{$hot_side->title}}">
                      <div class="item-link">
                         <img src="{{asset('uploads/movie/'.$hot_side->image)}}" class="lazy post-thumb" alt="{{$hot_side->title}}" title="{{$hot_side->title}}" />
                         <span class="is_trailer">
                            @if($hot_side->quality==0) HD
                            @elseif ($hot_side->quality==1) SD
                            @elseif ($hot_side->quality==2) FullHD
                            @elseif ($hot_side->quality==3) 2K
                            @elseif ($hot_side->quality==4) 4K
                            @else
                                Trailer
                            @endif
                         </span>
                      </div>
                      <p class="title">{{$hot_side->title}}</p>
                   </a>

                   <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                   <div style="float: left;">
                      <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                      <span style="width: 0%"></span>
                      </span>
                   </div>
                </div>
                @endforeach


             </div>
          </div>
       </section>
       <div class="clearfix"></div>
    </div>
 </aside>
 <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Top Views</span>
             <ul class="halim-popular-tab" role="tablist">
                <li role="presentation" class="active">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                </li>
                <li role="presentation">
                   <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                </li>
             </ul>
          </div>
       </div>
       <section class="tab-content">
          <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
             <div class="halim-ajax-popular-post-loading hidden"></div>
             <div id="halim-ajax-popular-post" class="popular-post">
                @foreach ($phimhot_sidebar as $key => $hot_side)
                <div class="item post-37176">
                   <a href="{{route('movie',$hot_side->slug)}}"  title="{{$hot_side->title}}">
                      <div class="item-link">
                         <img src="{{asset('uploads/movie/'.$hot_side->image)}}" class="lazy post-thumb" alt="{{$hot_side->title}}" title="{{$hot_side->title}}" />
                         <span class="is_trailer">
                            @if($hot_side->quality==0) HD
                            @elseif ($hot_side->quality==1) SD
                            @elseif ($hot_side->quality==2) FullHD
                            @elseif ($hot_side->quality==3) 2K
                            @elseif ($hot_side->quality==4) 4K
                            @else
                                Trailer
                            @endif
                         </span>
                      </div>
                      <p class="title">{{$hot_side->title}}</p>
                   </a>

                   <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                   <div style="float: left;">
                      <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                      <span style="width: 0%"></span>
                      </span>
                   </div>
                </div>
                @endforeach


             </div>
          </div>
       </section>
       <div class="clearfix"></div>
    </div>
 </aside>
