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
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <style>
                            .iframe_phim iframe {
                                width: 100%;
                                height: 510px;
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
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Bình luận</h5>
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

                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Bình luận của bạn</h5>
                        </div>
                        <form action="#">
                            <textarea placeholder="Bình luận"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Đăng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                            "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                                .valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
    <!-- Anime Section End -->
@endsection
